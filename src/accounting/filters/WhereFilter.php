<?php

namespace Xero\accounting\filters;

interface WhereFilter
{
    /**
     * @param string $where
     * @return mixed
     */

    public function where(string $where);
}