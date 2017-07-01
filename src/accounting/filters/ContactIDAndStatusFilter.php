<?php

namespace Xero\accounting\filters;


/**
 * Interface ContactIdAndStatus
 * @package Xero\accounting\filters
 */
interface ContactIDAndStatusFilter
{
    /**
     * @param string $contactId
     * @param string $status
     * @return mixed
     */
    public function contactIdAndStatus(string $contactId, string $status);
}