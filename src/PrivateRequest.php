<?php

namespace Xero;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

class PrivateRequest{

    protected $baseUri = 'https://api.xero.com/';

    private $authentication;

    /**
     * PrivateRequest constructor.
     * @param array $authentication
     */

    function __construct(array $authentication)
    {
        $this->authentication = $authentication;
    }

    /**
     * @param string $method
     * @param string $resourcePath
     * @param array $query
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */

    public function sendRequest(string $method, string $resourcePath, array $query = [])
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