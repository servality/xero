<?php

namespace Xero\accounting\filters;

interface IdsFilter
{
    /**
     * @param string $ids - CSV string of IDs
     * @return mixed
     */

    public function ids(string $ids);
}