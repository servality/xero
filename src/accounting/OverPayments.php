<?php

namespace Xero\accounting;

use Xero\accounting\filters\ModifiedAfterFilter;
use Xero\accounting\filters\OrderByFilter;
use Xero\accounting\filters\PageFilter;
use Xero\accounting\filters\WhereFilter;

class OverPayments extends AccountingBase implements
    ModifiedAfterFilter,
    WhereFilter,
    OrderByFilter,
    PageFilter
{

    function __construct($config)
    {
        parent::__construct($config);
    }

    public function modifiedAfter(string $timestamp)
    {
        $this->addToHeaders($this->modifiedAfterHeader($timestamp));

        return $this;
    }

    public function orderBy(string $orderBy, string $direction = null)
    {
        $this->addToQuery($this->orderParameter($orderBy, $direction));

        return $this;
    }

    public function page(int $page)
    {
        $this->addToQuery($this->pageParameter($page));

        return $this;
    }

    public function where(string $where)
    {
        $this->addToQuery($this->whereParameter($where));

        return $this;
    }

    public function get($identifier = null)
    {
        if ($identifier) {
            return $this->sendRequest('GET', 'Overpayments/' . $identifier);
        }
        return $this->sendRequest('GET', 'Overpayments');
    }
}