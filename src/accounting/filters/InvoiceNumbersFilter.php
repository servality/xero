<?php

namespace Xero\accounting\filters;

interface InvoiceNumbersFilter
{
    /**
     * @param string $numbers
     * @return mixed
     */

    public function invoiceNumbers(string $numbers);
}