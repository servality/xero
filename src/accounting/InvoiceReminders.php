<?php

namespace Xero\accounting;

/**
 * Class InvoiceReminders
 * @package Xero\accounting
 */
class InvoiceReminders extends AccountingBase
{
    /**
     * InvoiceReminders constructor.
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
        return $this->sendRequest('GET', 'InvoiceReminders/Settings');
    }
}