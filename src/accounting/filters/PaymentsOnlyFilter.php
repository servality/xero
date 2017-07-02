<?php

namespace Xero\accounting\filters;


/**
 * Interface PaymentsOnly
 * @package Xero\accounting\filters
 */
interface PaymentsOnlyFilter
{
    /**
     * @param bool $paymentsOnly
     * @return mixed
     */
    public function paymentsOnly(bool $paymentsOnly = true);
}