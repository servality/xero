<?php

namespace Xero\accounting;


/**
 * Class Organisation
 * @package Xero\accounting
 */
class Organisation extends AccountingBase
{
    /**
     * @return string
     */
    public function get()
    {
        return $this->sendRequest('GET', 'Organisation');
    }
}