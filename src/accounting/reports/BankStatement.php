<?php

namespace Xero\accounting\reports;

use Xero\accounting\AccountingBase;
use Xero\accounting\filters\FromDateFilter;
use Xero\accounting\filters\ToDateFilter;

class BankStatement extends AccountingBase implements
    FromDateFilter,
    ToDateFilter
{

    function __construct(array $config)
    {
        parent::__construct($config);
    }

    private function bankAccountId(string $id)
    {
        $this->addToQuery($this->bankAccountIdParameter($id));

        return $this;
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

    public function get(string $bankAccountID)
    {
        $this->bankAccountId($bankAccountID);

        return $this->sendRequest('GET', 'Reports/BankStatement');
    }
}