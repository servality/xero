<?php

namespace Xero\accounting\filters;


/**
 * Interface Date
 * @package Xero\accounting\filters
 */
interface DateFilter
{
    /**
     * @param $date
     * @return mixed
     */
    public function date($date);
}