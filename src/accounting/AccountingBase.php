<?php
namespace Xero\accounting;

use Xero\accounting\filters\AccountingFilterHelper;
use Xero\PrivateRequest;

class AccountingBase
{
    protected $parameters = [];
    protected $additionalHeaders = [];
    private $config;

    use AccountingFilterHelper;

    /**
     * @param array $config
     */

    function __construct($config)
    {
        $this->config = $config;
    }

    /**
     * @param array $parameter
     */

    protected function addToQuery(array $parameter)
    {
        $this->parameters = array_merge($this->parameters, $parameter);
        return;
    }

    /**
     * @param array $header
     */

    protected function addToHeaders(array $header)
    {
        $this->parameters = array_merge($this->additionalHeaders, $header);
        return;
    }

    /**
     * @param string $method
     * @param string $resourcePath
     * @param string $xml
     * @return string
     */

    protected function sendRequest(string $method, string $resourcePath, string $xml = null){

        $request = new PrivateRequest($this->config);

        $response = $request->sendRequest($method, 'api.xro/2.0/'.$resourcePath, $this->parameters, $this->additionalHeaders, $xml);

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

        return $this->sendRequest('POST', $resourceType.'s/'.$identifier, $xml);
    }
}