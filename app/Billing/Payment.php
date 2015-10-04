<?php namespace App\Billing;

use App\Donor;
use Crypt;
use Config;

class Payment extends PaypalGateway {

    /* The charge amount */
    protected $amount;
    /* the payment type (single or recurring)*/
    protected $type;

    //'------------------------------------
    //' The currencyCodeType and paymentType
    //' are set to the selections made on the Integration Assistant
    //'------------------------------------
    protected $currencyCodeType = "USD";
    protected $paymentType = "Sale";

    //'------------------------------------
    //' The returnURL is the location where buyers return to when a
    //' payment has been succesfully authorized.
    //'------------------------------------
    protected $returnUrl;

    //'------------------------------------
    //' The cancelURL is the location buyers are sent to when they hit the
    //' cancel button during authorization of payment during the PayPal flow
    //'
    //' This is set to the value entered on the Integration Assistant
    //'------------------------------------
    protected $cancelUrl;

    protected $paypal_token;

    /**
     * @var Donor
     */
    private $donor;

    public function __construct($amount, $type, Donor $donor) {
        $this->amount = $amount;
        $this->type = $type;
        $this->donor = $donor;

        $token = Crypt::encrypt($donor->email);
        $this->returnUrl = route('donations.review', ['donor_id' => $this->donor->id, 'pups_token' => $token]);
        $this->cancelUrl = route('pets.index');
    }

    function prepare() {
        $resArray = $this->CallMarkExpressCheckout($this->amount, $this->currencyCodeType, $this->paymentType, $this->returnUrl,
            $this->cancelUrl);

        $acknowledgment = strtoupper($resArray["ACK"]);

        if ($acknowledgment != "SUCCESS" && $acknowledgment != "SUCCESSWITHWARNING") {
            throw new PaymentErrorException($resArray);
        }

        $this->paypal_token = urldecode($resArray["TOKEN"]);
    }

    public function getSubmissionUrl() {
        return Config::get('paypal.url') . $this->paypal_token;
    }

    /*
	'-------------------------------------------------------------------------------------------------------------------------------------------
	' Purpose: 	Prepares the parameters for the SetExpressCheckout API Call.
	' Inputs:
	'		paymentAmount:  	Total value of the shopping cart
	'		currencyCodeType: 	Currency code value the PayPal API
	'		paymentType: 		paymentType has to be one of the following values: Sale or Order or Authorization
	'		returnURL:			the page where buyers return to after they are done with the payment review on PayPal
	'		cancelURL:			the page where buyers return to when they cancel the payment review on PayPal
	'		shipToName:		the Ship to name entered on the merchant's site
	'		shipToStreet:		the Ship to Street entered on the merchant's site
	'		shipToCity:			the Ship to City entered on the merchant's site
	'		shipToState:		the Ship to State entered on the merchant's site
	'		shipToCountryCode:	the Code for Ship to Country entered on the merchant's site
	'		shipToZip:			the Ship to ZipCode entered on the merchant's site
	'		shipToStreet2:		the Ship to Street2 entered on the merchant's site
	'		phoneNum:			the phoneNum  entered on the merchant's site
	'--------------------------------------------------------------------------------------------------------------------------------------------
	*/
    private function CallMarkExpressCheckout($paymentAmount, $currencyCodeType, $paymentType, $returnURL, $cancelURL) {
        //------------------------------------------------------------------------------------------------------------------------------------
        // Construct the parameter string that describes the SetExpressCheckout API call in the shortcut implementation

        $nvpstr = "&PAYMENTREQUEST_0_AMT=" . $paymentAmount;
        $nvpstr = $nvpstr . "&PAYMENTREQUEST_0_PAYMENTACTION=" . $paymentType;
        $nvpstr = $nvpstr . "&RETURNURL=" . $returnURL;
        $nvpstr = $nvpstr . "&CANCELURL=" . $cancelURL;
        $nvpstr = $nvpstr . "&NOSHIPPING=" . 1;
        $nvpstr = $nvpstr . "&PAYMENTREQUEST_0_CURRENCYCODE=" . $currencyCodeType;


        $_SESSION["currencyCodeType"] = $currencyCodeType;
        $_SESSION["PaymentType"] = $paymentType;

        //'---------------------------------------------------------------------------------------------------------------
        //' Make the API call to PayPal
        //' If the API call succeded, then redirect the buyer to PayPal to begin to authorize payment.
        //' If an error occured, show the resulting errors
        //'---------------------------------------------------------------------------------------------------------------
        $resArray = $this->hash_call("SetExpressCheckout", $nvpstr);

        return $resArray;
    }
}
