<?php

namespace Xero\accounting;

use Xero\accounting\filters\OrderByFilter;
use Xero\accounting\filters\WhereFilter;

/**
 * Class Currencies
 * @package Xero\accounting
 */
class Currencies extends AccountingBase implements
    WhereFilter,
    OrderByFilter
{

    /**
     * Currencies constructor.
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
     * @return string
     */
    public function get()
    {
        return $this->sendRequest('GET', 'Currencies');
    }
}