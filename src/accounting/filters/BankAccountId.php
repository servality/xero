<?php

namespace Xero\accounting\filters;


/**
 * Interface BankAccountId
 * @package Xero\accounting\filters
 */
interface BankAccountId
{
    /**
     * @param string $id
     * @return mixed
     */
    public function bankAccountId(string $id);
}