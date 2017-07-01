<?php

namespace Xero\accounting\filters;


/**
 * Interface TrackingCategoryId
 * @package Xero\accounting\filters
 */
interface TrackingCategoryIdFilter
{
    /**
     * @param $id
     * @return mixed
     */
    public function trackingCategoryId($id);
}