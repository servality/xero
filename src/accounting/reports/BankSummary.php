<?php

namespace Xero\accounting\reports;

use Xero\accounting\AccountingBase;
use Xero\accounting\filters\FromDateFilter;
use Xero\accounting\filters\ToDateFilter;

class BankSummary extends AccountingBase implements
    FromDateFilter,
    ToDateFilter
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

    public function toDate($date)
    {
        $this->addToQuery($this->toDateParameter($date));

        return $this;
    }

    public function get()
    {
        return $this->sendRequest('GET', 'Reports/BankSummary');
    }

}