<?php

namespace Xero\accounting\filters;


/**
 * Interface TargetTransactionId
 * @package Xero\accounting\filters
 */
interface TargetTransactionIDFilter
{
    /**
     * @param $id
     * @return mixed
     */
    public function targetTransactionID($id);
}