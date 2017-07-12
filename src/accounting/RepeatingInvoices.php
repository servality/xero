<?php

namespace Xero\accounting;

use Xero\accounting\filters\OrderByFilter;
use Xero\accounting\filters\WhereFilter;

/**
 * Class RepeatingInvoices
 * @package Xero\accounting
 */
class RepeatingInvoices extends AccountingBase implements
    WhereFilter,
    OrderByFilter
{

    /**
     * RepeatingInvoices constructor.
     * @param array $config
     */
    function __construct($config)
    {
        parent::__construct($config);
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
     * @param null $identifier
     * @return string
     */
    public function get($identifier = null)
    {
        if ($identifier) {
            return $this->sendRequest('GET', 'RepeatingInvoices/' . $identifier);
        }
        return $this->sendRequest('GET', 'RepeatingInvoices');
    }
}