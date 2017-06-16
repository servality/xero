<?php

namespace Xero;


class Invoices extends XeroApplication
{

    function __construct($auth)
    {
        parent::__construct($auth);
    }

    public function get($filters = null)
    {
       return $this->sendRequest('invoices');
    }

    public function getByUuid($uuid)
    {
        $this->sendRequest('invoices');
    }
}