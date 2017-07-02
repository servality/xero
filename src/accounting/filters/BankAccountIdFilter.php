<?php

namespace Xero\accounting\filters;


/**
 * Interface BankAccountId
 * @package Xero\accounting\filters
 */
interface BankAccountIdFilter
{
    /**
     * @param string $id
     * @return mixed
     */
    public function bankAccountId(string $id);
}