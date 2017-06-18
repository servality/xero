<?php

namespace Xero;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;


class XeroApplication
{
    var $authentication = [
        "consumer_key" => '',
        "consumer_secret" => '',
        "private_key_file" => '',
        "private_key_passphrase" => '',
        "signature_method" => Oauth1::SIGNATURE_METHOD_RSA
    ];

    var $baseUri = 'https://api.xero.com/api.xro/2.0/';

    function __construct($auth)
    {
        $this->authentication = $auth;
    }

    public function sendRequest($resourcePath)
    {
        $stack = HandlerStack::create();

        $middleware = new Oauth1($this->authentication);

        $stack->push($middleware);

        $client = new Client([
            'handler' => $stack
        ]);

        $response = $client->get($this->baseUri & $resourcePath, ['auth' => 'oauth']);

        return $response;
    }
}