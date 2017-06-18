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
        'token'           => '',
        'token_secret'    => '',
        "private_key_file" => '',
        "private_key_passphrase" => '',
        "signature_method" => Oauth1::SIGNATURE_METHOD_RSA
    ];

    var $baseUri = 'https://api.xero.com/api.xro/2.0/';

    function __construct(array $auth)
    {
        foreach ($auth as $key => $value) {
            $this->authentication[$key] = $value;
        }
    }

    public function sendRequest($method, $resourcePath)
    {
        $stack = HandlerStack::create();

        $middleware = new Oauth1($this->authentication);

        $stack->push($middleware);

        $client = new Client([
            'handler' => $stack,
            'base_uri' => $this->baseUri
        ]);

        $headers = [
            'User-Agent' => 'testing/1.0',
            'Accept'     => 'application/json',
        ];

        $response = $client->request($method, $resourcePath, ['auth' => 'oauth', 'headers' => $headers]);

        return $response;
    }
}