<?php

namespace Xero\accounting;

use Xero\PrivateRequest;

class Accounting
{
    protected $parameters = [];

    /**
     * @param array $parameter
     */

    protected function addToQuery(array $parameter)
    {
        $this->parameters = array_merge($this->parameters, $parameter);
        return;

    }

    /**
     * @param array $authentication
     * @param string $method
     * @param string $resourcePath
     * @param array $query
     * @return string
     */

    protected function sendRequest(array $authentication, string $method, string $resourcePath, array $query = []){

        $request = new PrivateRequest($authentication);

        $response = $request->sendRequest($method, 'api.xro/2.0/'.$resourcePath, $query);

        return $response->getBody()->getContents();
    }
}