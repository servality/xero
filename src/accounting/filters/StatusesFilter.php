<?php

namespace Xero\accounting\filters;


/**
 * Interface Statuses
 * @package Xero\accounting\filters
 */
interface StatusesFilter
{
    /**
     * @param string $statuses
     * @return mixed
     */
    public function statuses(string $statuses);
}