<?php

namespace Xero\accounting\filters;

interface OrderByFilter
{
    /**
     * @param string $orderBy
     * @param string|null $direction
     * @return mixed
     */

    public function orderBy(string $orderBy, string $direction = null);
}