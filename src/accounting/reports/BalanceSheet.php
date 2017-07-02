<?php

namespace Xero\accounting\reports;

use Xero\accounting\AccountingBase;
use Xero\accounting\filters\DateFilter;
use Xero\accounting\filters\PaymentsOnlyFilter;
use Xero\accounting\filters\StandardLayoutFilter;
use Xero\accounting\filters\TrackingOptionId1Filter;
use Xero\accounting\filters\TrackingOptionId2Filter;

class BalanceSheet extends AccountingBase implements
    DateFilter,
    TrackingOptionId1Filter,
    TrackingOptionId2Filter,
    StandardLayoutFilter,
    PaymentsOnlyFilter
{
    function __construct(array $config)
    {
        parent::__construct($config);
    }

    public function date($date)
    {
        $this->addToQuery($this->dateParameter($date));

        return $this;
    }

    public function paymentsOnly(bool $paymentsOnly = true)
    {
        $this->addToQuery($this->paymentsOnlyParameter($paymentsOnly));

        return $this;
    }

    public function standardLayout(bool $standardLayout = true)
    {
        $this->addToQuery($this->standardLayoutParameter($standardLayout));

        return $this;
    }

    public function trackingOptionId1(string $id)
    {
        $this->addToQuery($this->trackingOptionId1Parameter($id));

        return $this;
    }

    public function trackingOptionId2(string $id)
    {
        $this->addToQuery($this->trackingOptionId2Parameter($id));

        return $this;
    }

    public function get()
    {
        return $this->sendRequest('GET', 'Reports/BalanceSheet');
    }
}