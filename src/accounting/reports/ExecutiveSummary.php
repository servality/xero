<?php

namespace Xero\accounting\reports;

use Xero\accounting\AccountingBase;
use Xero\accounting\filters\DateFilter;

class ExecutiveSummary extends AccountingBase implements
    DateFilter
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

    public function get()
    {
        return $this->sendRequest('GET', 'Reports/ExecutiveSummary');
    }
}