<?php
namespace Xero\accounting;

use Xero\accounting\filters\AccountingFilterHelper;
use Xero\PrivateRequest;

/**
 * Class AccountingBase
 * @package Xero\accounting
 */
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
     * @param string $resourceType
     * @param string $identifier
     * @param string $status
     * @return string
     */

    protected function updateStatus(string $resourceType, string $identifier, string $status){

        $statusTag = $resourceType == 'Contact' ? 'ContactStatus' : 'Status';
        $resourcePath = $resourceType == 'TrackingCategory' ? 'TrackingCategories' : $resourceType.'s';

        $xml = '
        <'.$resourceType.'>
            <'.$resourceType.'ID>8694c9c5-7097-4449-a708-b8c1982921a4</'.$resourceType.'ID>
            <'.$statusTag.'>'.$status.'<'.$statusTag.'>
        </'.$resourceType.'>';

        return $this->sendRequest('POST', $resourcePath.'/'.$identifier, $xml);
    }
}