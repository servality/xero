<?php

namespace Xero\accounting\filters;


/**
 * Interface ContactID
 * @package Xero\accounting\filters
 */
interface ContactIDFilter
{
    /**
     * @param string $id
     * @return mixed
     */
    public function contactId(string $id);
}