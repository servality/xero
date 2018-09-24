<?php

namespace Xero;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

class PrivateRequest
{

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
     * @param array $additionalHeaders
     * @param null $data
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */

    public function sendRequest(string $method, string $resourcePath, array $query = [], array $additionalHeaders = null, $data = null)
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
            'Accept' => 'application/' . $this->config['response'],
        ];

        if ($method == 'POST') {
            $postHeaders = [
                'Content-Type' => 'application/x-www-form-urlencoded',
                'Encoding' => 'UTF-8'
            ];

            $headers = array_merge($headers, $postHeaders);
        }

        if ($additionalHeaders) {
            $headers = array_merge($headers, $additionalHeaders);
        }

        $formParameters = [
            'xml' => $data
        ];

        $response = $client->request($method, $resourcePath, ['auth' => 'oauth', 'headers' => $headers, 'query' => $query, 'form_params' => $formParameters]);

        return $response;
    }
}