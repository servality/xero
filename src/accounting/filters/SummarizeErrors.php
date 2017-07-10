<?php

namespace Xero\accounting\filters;


/**
 * Interface SummarizeErrors
 * @package Xero\accounting\filters
 */
interface SummarizeErrors
{
    /**
     * @param bool $summarizeErrors
     * @return mixed
     */

    public function SummarizeErrors(bool $summarizeErrors = false);
}