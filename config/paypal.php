<?php

return array(
    'url'          => env('PAYPAL_URL', "https://www.sandbox.paypal.com/webscr?cmd=_express-checkout&token="),

    'api_endpoint' => env('PAYPAL_API_ENDPOINT', "https://api-3t.sandbox.paypal.com/nvp"),

    'api_username' => env('PAYPAL_API_USERNAME'),

    'api_password' => env('PAYPAL_API_PASSWORD'),

    'api_signature' => env('PAYPAL_API_SIGNATURE')
);

