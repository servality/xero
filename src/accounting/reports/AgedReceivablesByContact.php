<?php

namespace Xero\accounting\reports;

use Xero\accounting\AccountingBase;
use Xero\accounting\filters\DateFilter;
use Xero\accounting\filters\FromDateFilter;
use Xero\accounting\filters\ToDateFilter;

class AgedReceivablesByContact extends AccountingBase implements
    DateFilter,
    FromDateFilter,
    ToDateFilter
{
    function __construct(array $config)
    {
        parent::__construct($config);
    }

    private function contactId(string $id)
    {
        $this->addToQuery($this->contactIdParameter($id));

        return $this;
    }

    public function date($date)
    {
        $this->addToQuery($this->dateParameter($date));

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

    public function get(string $contactID)
    {
        $this->contactId($contactID);

        return $this->sendRequest('GET', 'Reports/AgedReceivablesByContact');
    }
}