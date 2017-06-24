<?php

namespace Xero\accounting;

use Xero\PrivateRequest;

class Accounting
{
    /**
     * @param $parameter
     */

    protected $parameters = [];

    protected function addToQuery(array $parameter)
    {
        $this->parameter = array_push($this->parameters, $parameter);
        return;

    }

    protected function sendRequest($authentication, $method, $resourcePath, $query){

        $request = new PrivateRequest($authentication);

        $response = $request->sendRequest($method, 'api.xro/2.0/'.$resourcePath, $query);

        return $response->getBody()->getContents();
    }
}