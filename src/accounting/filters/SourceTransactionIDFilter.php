<?php

namespace Xero\accounting\filters;


/**
 * Interface SourceTransactionID
 * @package Xero\accounting\filters
 */
interface SourceTransactionIDFilter
{
    /**
     * @param $id
     * @return mixed
     */
    public function sourceTransactionId($id);
}