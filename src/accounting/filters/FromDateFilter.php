<?php

namespace Xero\accounting\filters;


/**
 * Interface FromDate
 * @package Xero\accounting\filters
 */
interface FromDateFilter
{
    /**
     * @param $date
     * @return mixed
     */
    public function fromDate($date);
}