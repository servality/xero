<?php

namespace Xero\accounting\filters;


/**
 * Interface Periods
 * @package Xero\accounting\filters
 */
interface PeriodsFilter
{
    /**
     * @param int $periods
     * @return mixed
     */
    public function periods(int $periods);
}