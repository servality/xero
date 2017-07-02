<?php

namespace Xero\accounting\filters;


/**
 * Interface DateFromAndDateTo
 * @package Xero\accounting\filters
 */
interface DateFromAndDateToFilter
{
    /**
     * @param $dateFrom
     * @param $dateTo
     * @return mixed
     */
    public function dateFromAndDateTo($dateFrom, $dateTo);
}