<?php

namespace Xero\accounting\filters;


/**
 * Interface ContactIDs
 * @package Xero\accounting\filters
 */
interface ContactIDsFilter
{
    /**
     * @param string $ids
     * @return mixed
     */
    public function contactIds(string $ids);
}