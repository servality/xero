<?php

namespace Xero\accounting\filters;


/**
 * Interface ContactIDs
 * @package Xero\accounting\filters
 */
interface ContactIDs
{
    /**
     * @param string $ids
     * @return mixed
     */
    public function contactIds(string $ids);
}