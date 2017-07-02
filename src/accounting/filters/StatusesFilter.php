<?php

namespace Xero\accounting\filters;


/**
 * Interface Statuses
 * @package Xero\accounting\filters
 */
interface StatusesFilter
{
    const STATUS_DRAFT = 'DRAFT';
    const STATUS_SUBMITTED = 'SUBMITTED';
    const STATUS_DELETED = 'DELETED';
    const STATUS_AUTHORISED = 'AUTHORISED';
    const STATUS_PAID = 'PAID';
    const STATUS_VOIDED = 'VOIDED';

    /**
     * @param string $statuses
     * @return mixed
     */
    public function statuses(string $statuses);
}