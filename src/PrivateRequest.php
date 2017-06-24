<?php

namespace Xero;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

class PrivateRequest{

    protected $baseUri = 'https://api.xero.com/';
    private $authentication;

    function __construct($authentication)
    {
        $this->authentication = $authentication;
    }

    public function sendRequest($method, $resourcePath, $query = [])
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

        $response = $client->request($method, $resourcePath, ['auth' => 'oauth', 'headers' => $headers, 'query' => $query]);

        return $response;
    }
}