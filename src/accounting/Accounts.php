<?php

namespace Xero\accounting;

use Xero\accounting\filters\ModifiedAfterFilter;
use Xero\accounting\filters\OrderByFilter;
use Xero\accounting\filters\WhereFilter;

/**
 * Class Accounts
 * @package Xero\accounting
 */
class Accounts extends AccountingBase implements
    ModifiedAfterFilter,
    WhereFilter,
    OrderByFilter
{
    /**
     * Accounts constructor.
     * @param array $config
     */
    function __construct($config)
    {
        parent::__construct($config);
    }

    /**
     * @param string $timestamp
     * @return $this
     */
    public function modifiedAfter(string $timestamp)
    {
        $this->addToHeaders($this->modifiedAfterHeader($timestamp));

        return $this;
    }

    /**
     * @param string $orderBy
     * @param string|null $direction
     * @return $this
     */
    public function orderBy(string $orderBy, string $direction = null)
    {
        $this->addToQuery($this->orderParameter($orderBy, $direction));

        return $this;
    }

    /**
     * @param string $where
     * @return $this
     */
    public function where(string $where)
    {
        $this->addToQuery($this->whereParameter($where));

        return $this;
    }

    /**
     * @param null string $identifier
     * @return string
     */
    public function get(string $identifier = null)
    {
        if ($identifier) {
            return $this->sendRequest('GET', 'Accounts/' . $identifier);
        }
        return $this->sendRequest('GET', 'Accounts');
    }

    /**
     * @param string $data
     * @return string
     */
    public function create(string $data)
    {
        return $this->sendRequest('PUT', 'Accounts', $data);
    }

    /**
     * @param string $identifier
     * @param string $data
     * @return string
     */
    public function update(string $identifier, string $data)
    {
        return $this->sendRequest('POST', 'Accounts/'.$identifier, $data);
    }

    /**
     * @param string $identifier
     * @return string
     */
    public function delete(string $identifier)
    {
        return $this->sendRequest('DELETE', 'Accounts/' . $identifier);
    }

    /**
     * @param string $identifier
     * @return string
     */
    public function archive(string $identifier)
    {
        return $this->updateStatus('Account', $identifier, 'ARCHIVED');
    }
}