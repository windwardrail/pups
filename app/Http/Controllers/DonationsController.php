<?php

namespace App\Http\Controllers;

use App\Donor;
use App\Pet;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

class DonationsController extends Controller {
    public function makeDonation(Request $request, $pet_id) {

        $pet = Pet::findOrFail($pet_id);

        $validator = Validator::make($request->all(), [
            'firstName'     => 'required',
            'lastName'      => 'required',
            'email'         => 'email',
            'donation-type' => 'required',
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

        $donation_type = $request->get('donation-type');
        $amount = $request->get('donation');

        $donor = new Donor([
            'first_name' => $request->get('firstName'),
            'last_name'  => $request->get('lastName'),
            'email'      => $request->get('email'),
            'subscribed' => $request->has('subscribed')
        ]);
        $pet->donors()->save($donor);

        /* Todo -- add code to submit payment to paypal */

        return 'success';
    }

    public function confirmDonation(Request $request) {
        /* Todo -- recieve confirmation from paypal and enable the donor  */
    }

    public function general() {
        $donations = Donor::all();
        return view('donations.general', ['donations' => $donations]);
    }

}
