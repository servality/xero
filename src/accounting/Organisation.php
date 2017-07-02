<?php

namespace Xero\accounting;

/**
 * Class Organisation
 * @package Xero\accounting
 */
class Organisation extends AccountingBase
{

    /**
     * Organisation constructor.
     * @param array $config
     */
    function __construct($config)
    {
        parent::__construct($config);
    }
    /**
     * @return string
     */
    public function get()
    {
        return $this->sendRequest('GET', 'Organisation');
    }
}