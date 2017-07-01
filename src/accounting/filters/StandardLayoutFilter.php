<?php

namespace Xero\accounting\filters;


/**
 * Interface StandardLayout
 * @package Xero\accounting\filters
 */
interface StandardLayoutFilter
{
    /**
     * @param bool $standardLayout
     * @return mixed
     */
    public function standardLayout(bool $standardLayout);
}