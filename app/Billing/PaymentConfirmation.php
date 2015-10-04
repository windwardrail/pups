<?php namespace App\Billing;

class PaymentConfirmation extends PaypalGateway {

    protected $token;
    protected $payerID;
    protected $FinalPaymentAmt;

    protected $response_data = [];

    /**
     * PaymentConfirmation constructor.
     * @param $token
     * @param $payerID
     * @param $FinalPaymentAmt
     */
    public function __construct($token, $payerID, $FinalPaymentAmt) {
        $this->token = $token;
        $this->payerID = $payerID;
        $this->FinalPaymentAmt = $FinalPaymentAmt;
    }

    public function confirm() {

        $resArray = $this->ConfirmPayment();

        $ack = strtoupper($resArray["ACK"]);

        if ($ack == "SUCCESS" || $ack == "SUCCESSWITHWARNING") {
            $this->extractResponseProperties($resArray);
        } else {
            throw new PaymentErrorException($resArray);
        }
    }

    private function extractResponseProperties($resArray) {
        /*
        '********************************************************************************************************************
        '
        ' THE PARTNER SHOULD SAVE THE KEY TRANSACTION RELATED INFORMATION LIKE
        '                    transactionId & orderTime
        '  IN THEIR OWN  DATABASE
        ' AND THE REST OF THE INFORMATION CAN BE USED TO UNDERSTAND THE STATUS OF THE PAYMENT
        '
        '********************************************************************************************************************
        */

        $this->response_data['transactionId'] = $resArray["PAYMENTINFO_0_TRANSACTIONID"]; // ' Unique transaction ID of the payment. Note:  If the PaymentAction of the request was Authorization or Order, this value is your AuthorizationID for use with the Authorization & Capture APIs.
        $this->response_data['transactionType'] = $resArray["PAYMENTINFO_0_TRANSACTIONTYPE"]; //' The type of transaction Possible values: l  cart l  express-checkout
        $this->response_data['paymentType'] = $resArray["PAYMENTINFO_0_PAYMENTTYPE"];  //' Indicates whether the payment is instant or delayed. Possible values: l  none l  echeck l  instant
        $this->response_data['orderTime'] = $resArray["PAYMENTINFO_0_ORDERTIME"];  //' Time/date stamp of payment
        $this->response_data['amt'] = $resArray["PAYMENTINFO_0_AMT"];  //' The final amount charged, including any shipping and taxes from your Merchant Profile.
        $this->response_data['currencyCode'] = $resArray["PAYMENTINFO_0_CURRENCYCODE"];  //' A three-character currency code for one of the currencies listed in PayPay-Supported Transactional Currencies. Default: USD.
        $this->response_data['feeAmt'] = $resArray["PAYMENTINFO_0_FEEAMT"];  //' PayPal fee amount charged for the transaction

        $this->response_data['taxAmt'] = $resArray["PAYMENTINFO_0_TAXAMT"];  //' Tax charged on the transaction.

        /*
        ' Status of the payment:
                'Completed: The payment has been completed, and the funds have been added successfully to your account balance.
                'Pending: The payment is pending. See the PendingReason element for more information.
        */

        $this->response_data['paymentStatus'] = $resArray["PAYMENTINFO_0_PAYMENTSTATUS"];

        /*
        'The reason the payment is pending:
        '  none: No pending reason
        '  address: The payment is pending because your customer did not include a confirmed shipping address and your Payment Receiving Preferences is set such that you want to manually accept or deny each of these payments. To change your preference, go to the Preferences section of your Profile.
        '  echeck: The payment is pending because it was made by an eCheck that has not yet cleared.
        '  intl: The payment is pending because you hold a non-U.S. account and do not have a withdrawal mechanism. You must manually accept or deny this payment from your Account Overview.
        '  multi-currency: You do not have a balance in the currency sent, and you do not have your Payment Receiving Preferences set to automatically convert and accept this payment. You must manually accept or deny this payment.
        '  verify: The payment is pending because you are not yet verified. You must verify your account before you can accept this payment.
        '  other: The payment is pending for a reason other than those listed above. For more information, contact PayPal customer service.
        */

        $this->response_data['pendingReason'] = $resArray["PAYMENTINFO_0_PENDINGREASON"];

        /*
        'The reason for a reversal if TransactionType is reversal:
        '  none: No reason code
        '  chargeback: A reversal has occurred on this transaction due to a chargeback by your customer.
        '  guarantee: A reversal has occurred on this transaction due to your customer triggering a money-back guarantee.
        '  buyer-complaint: A reversal has occurred on this transaction due to a complaint about the transaction from your customer.
        '  refund: A reversal has occurred on this transaction because you have given the customer a refund.
        '  other: A reversal has occurred on this transaction due to a reason not listed above.
        */

        $this->response_data['reasonCode'] = $resArray["PAYMENTINFO_0_REASONCODE"];
    }

    /*
	'-------------------------------------------------------------------------------------------------------------------------------------------
	' Purpose: 	Prepares the parameters for the GetExpressCheckoutDetails API Call.
	'
	' Inputs:
	'		sBNCode:	The BN code used by PayPal to track the transactions from a given shopping cart.
	' Returns:
	'		The NVP Collection object of the GetExpressCheckoutDetails Call Response.
	'--------------------------------------------------------------------------------------------------------------------------------------------
	*/
    private function ConfirmPayment() {
        /* Gather the information to make the final call to
           finalize the PayPal payment.  The variable nvpstr
           holds the name value pairs
           */
        $serverName = urlencode($_SERVER['SERVER_NAME']);

        $nvpstr = '&TOKEN=' . $this->token . '&PAYERID=' . $this->payerID . '&PAYMENTREQUEST_0_PAYMENTACTION=' . self::PAYMENT_TYPE . '&PAYMENTREQUEST_0_AMT=' . $this->FinalPaymentAmt;
        $nvpstr .= '&PAYMENTREQUEST_0_CURRENCYCODE=' . self::CURRENCY_TYPE . '&IPADDRESS=' . $serverName;

        /* Make the call to PayPal to finalize payment
           If an error occured, show the resulting errors
           */
        $resArray = $this->hash_call("DoExpressCheckoutPayment", $nvpstr);

        /* Display the API response back to the browser.
           If the response from PayPal was a success, display the response parameters'
           If the response was an error, display the errors received using APIError.php.
           */
        $ack = strtoupper($resArray["ACK"]);

        return $resArray;
    }

    public function getTransactionId() {
        return isset($this->response_data['transactionId']) ? $this->response_data['transactionId'] : null;
    }

    public function getOrderTime() {
        return isset($this->response_data['orderTime']) ? $this->response_data['orderTime'] : null;
    }
}