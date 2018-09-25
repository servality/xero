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
     * @param array|null $additionalHeaders
     * @param null $data
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */

    public function sendRequest(string $method, string $resourcePath, array $query = [], array $additionalHeaders = null, $data = null)
    {
        $contentType = $this->config['content_type'];
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

        if ($method == 'POST' | $method == 'PUT') {
            $postHeaders = [
                'Content-Type' => $contentType,
                'Encoding' => 'UTF-8'
            ];

            $headers = array_merge($headers, $postHeaders);
        }

        if ($additionalHeaders) {
            $headers = array_merge($headers, $additionalHeaders);
        }

        $requestOptions = [
            'auth' => 'oauth',
            'headers' => $headers,
            'query' => $query,
        ];

        if ($method == 'POST' | $method == 'PUT') {
            if ($contentType == 'application/x-www-form-urlencoded') {
                $requestOptions = array_merge($requestOptions, ['form_params' => ['xml' => 'data']]);
            } else if ($contentType == 'application/json') {
                $requestOptions = array_merge($requestOptions, ['json' => $data]);
            } else if ($contentType == 'application/xml') {
                $requestOptions = array_merge($requestOptions, ['body' => $data]);
            }
        }

        $response = $client->request($method, $resourcePath, $requestOptions);

        return $response;
    }
}