<?php

namespace Xero\accounting\filters;


/**
 * Interface Status
 * @package Xero\accounting\filters
 */
interface Status
{
    /**
     * @param $status
     * @return mixed
     */
    public function status($status);
}