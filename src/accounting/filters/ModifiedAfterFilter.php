<?php

namespace Xero\accounting\filters;

interface ModifiedAfterFilter
{
    /**
     * @param $timestamp
     * @return mixed
     */

    public function modifiedAfter(string $timestamp);
}