<?php

namespace Xero;

use Xero\accounting\Invoices;
use GuzzleHttp\Subscriber\Oauth\Oauth1;
use Xero\PrivateRequest;


class XeroApplication
{
    private $authentication = [
        "consumer_key" => '',
        "consumer_secret" => '',
        'token'           => '',
        'token_secret'    => '',
        "private_key_file" => '',
        "private_key_passphrase" => '',
        "signature_method" => Oauth1::SIGNATURE_METHOD_RSA
    ];

    private $invoices;

    function __construct(array $auth)
    {
        //set $authentication values
        foreach ($auth as $key => $value) {
            $this->authentication[$key] = $value;
        }
        //copy the consumer_key and consumer_secret tp token and token_secret respectively
        $this->authentication['token'] = $this->authentication['consumer_key'];
        $this->authentication['token_secret'] = $this->authentication['consumer_secret'];
    }

    public function invoices(){
        if(!is_a($this->invoices, 'Invoices')){
            $this->invoices = new Invoices($this->authentication);
        }
        return $this->invoices;
    }
}