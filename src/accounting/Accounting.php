<?php

namespace Xero\accounting;

use Xero\PrivateRequest;

class Accounting
{
    public function sendRequest($authentication, $method, $resourcePath, $query){

        $request = new PrivateRequest($authentication);

        return $request->sendRequest($method, 'api.xro/2.0/'.$resourcePath, $query);
    }
}