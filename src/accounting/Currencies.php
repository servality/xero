<?php

namespace Xero\accounting;

use Xero\accounting\filters\OrderByFilter;
use Xero\accounting\filters\WhereFilter;

class Currencies extends AccountingBase implements
    WhereFilter,
    OrderByFilter
{

    function __construct($config)
    {
        parent::__construct($config);
    }

    public function orderBy(string $orderBy, string $direction = null)
    {
        $this->addToQuery($this->orderParameter($orderBy, $direction));

        return $this;
    }

    public function where(string $where)
    {
        $this->addToQuery($this->whereParameter($where));

        return $this;
    }

    public function get()
    {
        return $this->sendRequest('GET', 'Currencies');
    }
}