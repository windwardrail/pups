<?php namespace App\Billing;

use Exception;

class PaymentErrorException extends Exception {

    protected $data;

    /**
     * PaymentErrorException constructor.
     * @param $data
     */
    public function __construct($data) {
        $this->data = $data;

        parent::__construct();
    }

    public function getInfo(){
        //Display a user friendly Error on the page using any of the following error information returned by PayPal
        $ErrorCode = urldecode($this->data["L_ERRORCODE0"]);
        $ErrorShortMsg = urldecode($this->data["L_SHORTMESSAGE0"]);
        $ErrorLongMsg = urldecode($this->data["L_LONGMESSAGE0"]);
        $ErrorSeverityCode = urldecode($this->data["L_SEVERITYCODE0"]);

        $msg = "SetExpressCheckout API call failed. " . '\n' .
            "Detailed Error Message: " . $ErrorLongMsg . '\n' .
            "Short Error Message: " . $ErrorShortMsg . '\n' .
            "Error Code: " . $ErrorCode . '\n' .
            "Error Severity Code: " . $ErrorSeverityCode . '\n';

        return $msg;
    }
}
