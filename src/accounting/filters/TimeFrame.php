<?php

namespace Xero\accounting\filters;


/**
 * Interface TimeFrame
 * @package Xero\accounting\filters
 */
interface TimeFrame
{
    /**
     * @param int $timeFrame
     * @return mixed
     */
    public function timeFrame(int $timeFrame);
}