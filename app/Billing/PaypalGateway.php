<?php namespace App\Billing;

use Config;

abstract class PaypalGateway {

    const PAYMENT_TYPE = 'Sale';
    const CURRENCY_TYPE = 'USD';

    /**
     * '-------------------------------------------------------------------------------------------------------------------------------------------
     * hash_call: Function to perform the API call to PayPal using API signature
     * @methodName is name of API  method.
     * @nvpStr is nvp string.
     * returns an associtive array containing the response from the server.
     * '-------------------------------------------------------------------------------------------------------------------------------------------
     */
    protected function hash_call($methodName, $nvpStr) {
        $API_Endpoint = Config::get('paypal.api_endpoint');

        //'------------------------------------
        //' PayPal API Credentials
        //' Replace <API_USERNAME> with your API Username
        //' Replace <API_PASSWORD> with your API Password
        //' Replace <API_SIGNATURE> with your Signature
        //'------------------------------------
        $API_UserName = Config::get('paypal.api_username');
        $API_Password = Config::get('paypal.api_password');
        $API_Signature = Config::get('paypal.api_signature');

        // BN Code 	is only applicable for partners
        $sBNCode = "PP-ECWizard";

        $PROXY_HOST = '127.0.0.1';
        $PROXY_PORT = '808';

        $USE_PROXY = false;
        $version = "93";

        //setting the curl parameters.
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $API_Endpoint);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);

        //turning off the server and peer verification(TrustManager Concept).
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);

        //if USE_PROXY constant set to TRUE in Constants.php, then only proxy will be enabled.
        //Set proxy name to PROXY_HOST and port number to PROXY_PORT in constants.php
        if ($USE_PROXY)
            curl_setopt($ch, CURLOPT_PROXY, $PROXY_HOST . ":" . $PROXY_PORT);

        //NVPRequest for submitting to server
        $nvpreq = "METHOD=" . urlencode($methodName) . "&VERSION=" . urlencode($version) . "&PWD=" . urlencode($API_Password) . "&USER=" . urlencode($API_UserName) . "&SIGNATURE=" . urlencode($API_Signature) . $nvpStr . "&BUTTONSOURCE=" . urlencode($sBNCode);

        //setting the nvpreq as POST FIELD to curl
        curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpreq);

        //getting response from server
        $response = curl_exec($ch);

        //convrting NVPResponse to an Associative Array
        $nvpResArray = $this->deformatNVP($response);
        $nvpReqArray = $this->deformatNVP($nvpreq);
        $_SESSION['nvpReqArray'] = $nvpReqArray;

        if (curl_errno($ch)) {
            // moving to display page to display curl errors
            $_SESSION['curl_error_no'] = curl_errno($ch);
            $_SESSION['curl_error_msg'] = curl_error($ch);

            //Execute the Error handling module to display errors.
        } else {
            //closing the curl
            curl_close($ch);
        }

        return $nvpResArray;
    }

    /*'----------------------------------------------------------------------------------
	 * This function will take NVPString and convert it to an Associative Array and it will decode the response.
	  * It is usefull to search for a particular key and displaying arrays.
	  * @nvpstr is NVPString.
	  * @nvpArray is Associative Array.
	   ----------------------------------------------------------------------------------
	  */
    private function deformatNVP($nvpstr)
    {
        $intial=0;
        $nvpArray = array();

        while(strlen($nvpstr))
        {
            //postion of Key
            $keypos= strpos($nvpstr,'=');
            //position of value
            $valuepos = strpos($nvpstr,'&') ? strpos($nvpstr,'&'): strlen($nvpstr);

            /*getting the Key and Value values and storing in a Associative Array*/
            $keyval=substr($nvpstr,$intial,$keypos);
            $valval=substr($nvpstr,$keypos+1,$valuepos-$keypos-1);
            //decoding the respose
            $nvpArray[urldecode($keyval)] =urldecode( $valval);
            $nvpstr=substr($nvpstr,$valuepos+1,strlen($nvpstr));
        }
        return $nvpArray;
    }
}
