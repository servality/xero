<?php

namespace Xero;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

class PrivateRequest{

    protected $baseUri = 'https://api.xero.com/';

    private $config;

    /**
     * PrivateRequest constructor.
     * @param array $config
     */

    function __construct(array $config)
    {
        $this->config = $config;
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
        $middleware = new Oauth1($this->config['oauth']);
        $stack->push($middleware);

        $client = new Client([
            'handler' => $stack,
            'base_uri' => $this->baseUri
        ]);

        $headers = [
            'User-Agent' => $this->config['user_agent'],
            'Accept'     => 'application/'.$this->config['response'],
        ];

        $response = $client->request($method, $resourcePath, ['auth' => 'oauth', 'headers' => $headers, 'query' => $query]);

        return $response;
    }
}