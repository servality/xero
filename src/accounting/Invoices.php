<?php

namespace Xero\accounting;

class Invoices extends Accounting
{
    private $auth;

    //Parameters
    private $modifiedAfter;
    private $ids;
    private $invoiceNumbers;
    private $contactIds;
    private $statuses;
    private $where;
    private $order;
    private $page;

    function __construct($auth)
    {
        $this->auth = $auth;
    }

    public function modifiedAfter($timestamp)
    {
        $this->modifiedAfter = '&ModifiedAfter=' . $timestamp;
        return $this;
    }

    public function ids(string $ids)
    {
        $this->ids = '&IDs=' . $ids; //CSV string
        return $this;
    }

    public function invoiceNumbers(string $invoiceNumbers)
    {
        $this->invoiceNumbers = '&InvoiceNumbers=' . $invoiceNumbers; //CSV string
        return $this;
    }

    public function contactIds(string $contactIds)
    {
        $this->contactIds = '&ContactIDs=' . $contactIds; //CSV string
        return $this;
    }

    public function statuses(string $statuses)
    {
        $this->statuses = '&Statuses=' . $statuses; //CSV string
        return $this;
    }

    public function where(string $where)
    {
        $this->where = '&where=' . $where;
        return $this;
    }

    public function orderBy(string $orderBy, string $direction = null)
    {
        $this->order = $direction ? '&order=' . $orderBy . ' ' . $direction : 'order=' . $orderBy;
        return $this;
    }

    public function page(int $page)
    {
        $this->page = '&page=' . $page;
        return $this;
    }

    public function get($identifier = null)  //Identifier can be either GUID (E.g 00000000-0000-0000-0000-00000000) or Invoice Number (E.g. INV-0154)
    {
        if($identifier){
            //
            $this->sendRequest($this->auth, 'GET', 'invoices'.'/'.$identifier, '');
        }
        $this->sendRequest($this->auth, 'GET', 'invoices', '');
    }
}