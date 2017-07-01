<?php

namespace Xero\accounting\filters;


/**
 * Interface TrackingOptionId
 * @package Xero\accounting\filters
 */
interface TrackingOptionId
{
    /**
     * @param string $id
     * @return mixed
     */
    public function trackingOptionId(string $id);
}