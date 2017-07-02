<?php

namespace Xero\accounting\reports;

use Xero\accounting\AccountingBase;
use Xero\accounting\filters\FromDateFilter;
use Xero\accounting\filters\PaymentsOnlyFilter;
use Xero\accounting\filters\StandardLayoutFilter;
use Xero\accounting\filters\ToDateFilter;
use Xero\accounting\filters\TrackingCategoryId2Filter;
use Xero\accounting\filters\TrackingCategoryIdFilter;
use Xero\accounting\filters\TrackingOptionIdFilter;
use Xero\accounting\filters\TrackingOptionId2Filter;

class ProfitAndLoss extends AccountingBase implements
    FromDateFilter,
    ToDateFilter,
    TrackingOptionIdFilter,
    TrackingOptionId2Filter,
    StandardLayoutFilter,
    PaymentsOnlyFilter,
    TrackingCategoryIdFilter,
    TrackingCategoryId2Filter
{
    
    function __construct(array $config)
    {
        parent::__construct($config);
    }


    public function fromDate($date)
    {
        $this->addToQuery($this->fromDateParameter($date));

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

    public function toDate($date)
    {
        $this->addToQuery($this->toDateParameter($date));

        return $this;
    }

    public function trackingCategoryId2($id)
    {
        $this->addToQuery($this->trackingCategoryId2Parameter($id));

        return $this;
    }

    public function trackingCategoryId($id)
    {
        $this->addToQuery($this->trackingCategoryIdParameter($id));

        return $this;
    }

    public function trackingOptionId(string $id)
    {
        $this->addToQuery($this->trackingOptionIdParameter($id));

        return $this;
    }

    public function trackingOptionId2(string $id)
    {
        $this->addToQuery($this->trackingOptionId2Parameter($id));

        return $this;
    }

    public function get()
    {
        return $this->sendRequest('GET', 'Reports/ProfitAndLoss');
    }
}