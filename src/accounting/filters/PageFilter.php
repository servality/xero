<?php

namespace Xero\accounting\filters;

interface PageFilter
{
    /**
     * @param int $page
     * @return mixed
     */

    public function page(int $page);
}