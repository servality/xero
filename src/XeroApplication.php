<?php

namespace Xero;

use Xero\accounting\Contacts;
use Xero\accounting\Invoices;
use GuzzleHttp\Subscriber\Oauth\Oauth1;
use Xero\PrivateRequest;


class XeroApplication
{
    /**
     * Xero Request Configuration
     * @var array
     */

    private $config = [
        'oauth' => [
            "consumer_key" => '',
            "consumer_secret" => '',
            'token'           => '',
            'token_secret'    => '',
            "private_key_file" => '',
            "private_key_passphrase" => '',
            "signature_method" => Oauth1::SIGNATURE_METHOD_RSA
        ],
        'response' => 'json', //json or xml
        'user_agent' => '' //name of application
    ];

    private $invoices;
    private $contacts;

    /**
     * XeroApplication constructor.
     * @param array $config
     */

    function __construct(array $config)
    {
        //set $configuration values
        foreach ($config as $key => $value) {
            if($key == 'oauth'){
                foreach ($value as $oauth_key => $oauth_value){
                    $this->config['oauth'][$oauth_key] = $oauth_value;
                }
                continue;
            }
            $this->config[$key] = $value;
        }
        //copy the consumer_key and consumer_secret tp token and token_secret respectively
        $this->config['oauth']['token'] = $this->config['oauth']['consumer_key'];
        $this->config['oauth']['token_secret'] = $this->config['oauth']['consumer_secret'];
    }

    /**
     * @return Invoices
     */

    public function invoices(){
        if(!is_a($this->invoices, 'Invoices')){
            $this->invoices = new Invoices($this->config);
        }
        return $this->invoices;
    }

    /**
     * @return Contacts
     */

    public function contacts(){
        if(!is_a($this->contacts, 'Contacts')){
            $this->invoices = new Contacts($this->config);
        }
        return $this->contacts;
    }
}