<?php

namespace Xero\accounting\reports;

use Xero\accounting\AccountingBase;
use Xero\accounting\filters\DateFilter;
use Xero\accounting\filters\PeriodsFilter;
use Xero\accounting\filters\TimeFrameFilter;

class BudgetSummary extends AccountingBase implements
    DateFilter,
    PeriodsFilter,
    TimeFrameFilter
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

    public function periods(int $periods)
    {
        $this->addToQuery($this->periodsParameter($periods));

        return $this;
    }

    public function timeFrame(int $timeFrame)
    {
        $this->addToQuery($this->timeFrameParameter($timeFrame));

        return $this;
    }

    public function get()
    {
        return $this->sendRequest('GET', 'Reports/BudgetSummary');
    }
}