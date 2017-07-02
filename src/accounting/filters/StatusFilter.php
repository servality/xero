<?php

namespace Xero\accounting\filters;


/**
 * Interface Status
 * @package Xero\accounting\filters
 */
interface StatusFilter
{
    /**
     * @param $status
     * @return mixed
     */
    public function status($status);
}