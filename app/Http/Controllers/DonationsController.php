<?php

namespace App\Http\Controllers;

use App\Billing\Payment;
use App\Billing\PaymentConfirmation;
use App\Billing\PaymentErrorException;
use App\Billing\PaymentReview;
use App\Donor;
use App\Pet;
use App\Transaction;
use Illuminate\Http\Request;
use App\Http\Requests;
use Log;
use Validator;
use Session;
use Crypt;

class DonationsController extends Controller {

    public function makeDonation(Request $request, $pet_id) {

        $validator = Validator::make($request->all(), [
            'firstName'     => 'required',
            'lastName'      => 'required',
            'email'         => 'email',
            //'donation-type' => 'required',
            'donation'      => 'required|numeric'
        ]);

        $validator->after(function($validator)use($request){
            $min_donation = Donor::MINIMUM_DONATION;
            if($request->get('donation') < $min_donation){
                $validator->errors()->add('donation', "The donation must be at least \${$min_donation}");
            }
        });

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors());
        }

        //$donation_type = $request->get('donation-type');
        $donation_type = Donor::ONE_TIME;
        $amount = $request->get('donation');

        if ($pet_id) {
            $pet = Pet::findOrFail($pet_id);
            $donor = new Donor([
                'first_name' => $request->get('firstName'),
                'last_name'  => $request->get('lastName'),
                'email'      => $request->get('email'),
                'subscribed' => $request->has('subscribed')
            ]);
            $pet->donors()->save($donor);
        } else {
            $donor = new Donor([
                'first_name' => $request->get('firstName'),
                'last_name'  => $request->get('lastName'),
                'email'      => $request->get('email'),
                'subscribed' => $request->has('subscribed')
            ]);
            $donor->pet_id = 0;
            $donor->save();
        }

        /* Make the payment object */
        $payment = new Payment($amount, $donation_type, $donor);

        /* Prepare the payment for submission */
        try {
            $payment->prepare();
        } catch(PaymentErrorException $e){
            Log::error($e->getInfo());
            return redirect()->back()->with('message', 'Sorry, a problem with paypal prevented us from processing your payment!');
        }

        /* Redirect to Paypal */
        $redirect_url = $payment->getSubmissionUrl();
        return Redirect()->to($redirect_url);
    }

    public function reviewDonation(Request $request, $donor_id) {
        $paypal_token = $request->get('token');
        $pups_token = $request->get('pups_token');
        $PayerID = $request->get('PayerID');

        $donor = Donor::findOrFail($donor_id);

        /* Check to make sure this paypal request originated from this donor */
        if(Crypt::decrypt($pups_token) != $donor->email){
            Log::warning('Bad pup token detected');

            return redirect()->route('pets.index');
        }

        $review = new PaymentReview($paypal_token);
        try{
            $info = $review->getDetails();
        } catch (PaymentErrorException $e){
            Log::error($e->getInfo());
            return redirect()->route('pets.index')->with('message', "We're sorry, an error occurred while communicating with Paypal. Please try again later.");
        }

        Session::put('paypal_token', $paypal_token);
        Session::put('payer_id', $PayerID);
        Session::put('pups_token', $pups_token);
        Session::put('paypal_amount', $info['AMT']);
        Session::put('paypal_token', $paypal_token);

        $payment = (object)[
            'first_name' => $info['FIRSTNAME'],
            'last_name' => $info['LASTNAME'],
            'amount' => $info['AMT'],
            'email' => $info['EMAIL']
        ];

        if($donor->pet_id == 0){
            $is_general = true;
            $pet = Pet::first();
        } else {
            $is_general = false;
            $pet = $donor->pet;
        }

        return view('donations.review', compact('donor', 'payment', 'pet', 'is_general'));
    }

    public function confirmDonation(Request $request, $donor_id) {

        $donor = Donor::findOrFail($donor_id);

        $token = session('paypal_token');
        $payerID = session('payer_id');
        $finalPaymentAmt = session('paypal_amount');

        $confirmation = new PaymentConfirmation($token, $payerID, $finalPaymentAmt);

        try{
            $confirmation->confirm();
        } catch(PaymentErrorException $e){
            Log::error($e->getInfo());
            return redirect()->route('pets.index')->with('message', "We're sorry, an error occurred while communicating with Paypal. Please try again later.");
        }

        $donor->transaction()->save(new Transaction([
            'transaction_id' => $confirmation->getTransactionId(),
            'order_time' => $confirmation->getOrderTime()
        ]));

        $donor->pending = false;
        $donor->save();

        if($donor->isGeneral()){
            $msg = "Thanks for your support!";
        } else {
            $msg = "Thank you for supporting {$donor->pet->name}!";
        }
        return redirect()->route('pets.index')->with('message', $msg);
    }

    public function general() {
        $donations = Donor::where('pet_id', '=', 0)
            ->whereNotNull('comment')
            ->get();
        return view('donations.general', ['donations' => $donations]);
    }

}
