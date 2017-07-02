<?php

namespace Xero\accounting\reports;

use Xero\accounting\AccountingBase;
use Xero\accounting\filters\DateFilter;
use Xero\accounting\filters\PaymentsOnlyFilter;

class TrialBalance extends AccountingBase implements
    DateFilter,
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

    public function get()
    {
        return $this->sendRequest('GET', 'Reports/TrialBalance');
    }
}