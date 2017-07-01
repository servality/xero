<?php

namespace Xero\accounting\filters;


/**
 * Interface ToDate
 * @package Xero\accounting\filters
 */
interface ToDateFilter
{
    /**
     * @param $date
     * @return mixed
     */
    public function toDate($date);
}