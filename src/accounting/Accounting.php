<?php

namespace Xero\accounting;

use Xero\PrivateRequest;

class Accounting
{
    protected $parameters = [];
    private $config;

    /**
     * @param array $parameter
     */

    function __construct($config)
    {
        $this->config = $config;
    }

    protected function addToQuery(array $parameter)
    {
        $this->parameters = array_merge($this->parameters, $parameter);
        return;

    }

    /**
     * @param array $config
     * @param string $method
     * @param string $resourcePath
     * @param array $query
     * @return string
     */

    protected function sendRequest(string $method, string $resourcePath, array $query = [], $xml = null){

        $request = new PrivateRequest($this->config);

        $response = $request->sendRequest($method, 'api.xro/2.0/'.$resourcePath, $query);

        return $response->getBody()->getContents();
    }

    /**
     * @param string $action
     * @param string $resourceType
     * @param string $identifier
     * @param string $identifierType
     * @return string
     */

    protected function voidOrDelete(string $action, string $resourceType, string $identifier, string $identifierType = 'guid')
    {

        $IdType = $identifierType == 'number' ? 'InvoiceNumber' : 'InvoiceID';
        $resourceType = ucfirst(strtolower($resourceType));
        $action = strtoupper($action);

        $xml = '
            <'.$resourceType.'>
              <'.$IdType.'>'.$identifier.'</'.$IdType.'>
              <Status>'.$action.'</Status>
            </'.$resourceType.'>
        ';

        return $this->sendRequest($this->config, 'POST', 'invoices/'.$identifier, '[]', $xml);
    }
}