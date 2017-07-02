<?php

namespace Xero\accounting\filters;


/**
 * Interface TimeFrame
 * @package Xero\accounting\filters
 */
interface TimeFrameFilter
{
    /**
     * @param int $timeFrame
     * @return mixed
     */
    public function timeFrame(int $timeFrame);
}