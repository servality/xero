<?php

namespace Xero\accounting;

use Xero\accounting\filters\DateFromAndDateToFilter;
use Xero\accounting\filters\ModifiedAfterFilter;
use Xero\accounting\filters\OrderByFilter;
use Xero\accounting\filters\PageFilter;
use Xero\accounting\filters\StatusFilter;

class PurchaseOrders extends AccountingBase implements
    ModifiedAfterFilter,
    OrderByFilter,
    PageFilter,
    StatusFilter,
    DateFromAndDateToFilter
{

    function __construct($config)
    {
        parent::__construct($config);
    }

    public function dateFromAndDateTo($dateFrom, $dateTo)
    {
        $this->addToQuery($this->dateFromAndDateToParameter($dateFrom, $dateTo));

        return $this;
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

    public function status($status)
    {
        $this->addToQuery($this->statusParameter($status));

        return $this;
    }

    public function get($identifier = null)
    {
        if ($identifier) {
            return $this->sendRequest('GET', 'PurchaseOrders/' . $identifier);
        }
        return $this->sendRequest('GET', 'PurchaseOrders');
    }
}