<?php

namespace Xero\accounting;


/**
 * Class InvoiceReminders
 * @package Xero\accounting
 */
class InvoiceReminders extends AccountingBase
{
    /**
     * @return string
     */
    public function get()
    {
        return $this->sendRequest('GET', 'InvoiceReminders');
    }
}