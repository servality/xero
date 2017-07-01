<?php

namespace Xero\accounting\filters;


/**
 * Interface Offset
 * @package Xero\accounting\filters
 */
interface OffsetFilter
{
    /**
     * @param string $offset
     * @return mixed
     */
    public function offset(string $offset);
}