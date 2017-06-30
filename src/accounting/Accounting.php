<?php

namespace Xero\accounting;

use Xero\PrivateRequest;

class Accounting
{
    protected $parameters = [];
    private $config;

    /**
     * @param array $config
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
     * @param string $method
     * @param string $resourcePath
     * @param array $query
     * @param string $xml
     * @return string
     */

    protected function sendRequest(string $method, string $resourcePath, array $query = [], string $xml = null){

        $request = new PrivateRequest($this->config);

        $response = $request->sendRequest($method, 'api.xro/2.0/'.$resourcePath, $query, $xml);

        return $response->getBody()->getContents();
    }

    /**
     * @param $timestamp
     * @return $this
     */

    public function modifiedAfter($timestamp)
    {
        $this->addToQuery(['ModifiedAfter' => $timestamp]);
        return $this;
    }

    /**
     * @param string $ids
     * @return $this
     */

    public function ids(string $ids)
    {
        $this->addToQuery(['IDs' => $ids]); //CSV string
        return $this;
    }

    /**
     * @param string $where
     * @return $this
     */

    public function where(string $where)
    {
        $this->addToQuery(['where' => $where]);
        return $this;
    }

    /**
     * Order results ASC or DESC
     * @param string $orderBy
     * @param string|null $direction
     * @return $this
     */

    public function orderBy(string $orderBy, string $direction = null)
    {
        $orderParameter = $direction ? $orderBy . ' ' . $direction : $orderBy;
        $this->addToQuery(['order' => $orderParameter]);
        return $this;
    }

    /**
     * Return paged results - 100 items per page
     * @param int $page
     * @return $this
     */

    public function page(int $page)
    {
        $this->addToQuery(['page' => $page]);
        return $this;
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

        return $this->sendRequest('POST', $resourceType.'s/'.$identifier, [], $xml);
    }
}