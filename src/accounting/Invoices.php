<?php

namespace Xero\accounting;

class Invoices extends Accounting
{

    /**
     * Invoices constructor.
     * @param $config
     */

    function __construct($config)
    {
        parent::__construct($config);
    }

    /**
     * @param $timestamp
     * @return $this
     */

    public function modifiedAfter($timestamp)
    {
        $this->addToQuery(['ModifiedAfter' => $timestamp]);
        return $this;
    }

    /**a
     * @param string $ids
     * @return $this
     */

    public function ids(string $ids)
    {
        $this->addToQuery(['IDs' => $ids]); //CSV string
        return $this;
    }

    /**
     * @param string $invoiceNumbers
     * @return $this
     */

    public function invoiceNumbers(string $invoiceNumbers)
    {
        $this->addToQuery(['InvoiceNumbers' => $invoiceNumbers]); //CSV string
        return $this;
    }

    /**
     * @param string $contactIds
     * @return $this
     */

    public function contactIds(string $contactIds)
    {
        $this->addToQuery(['ContactIDs' => $contactIds]); //CSV string
        return $this;
    }

    /**
     * @param string $statuses
     * @return $this
     */

    public function statuses(string $statuses)
    {
        $this->addToQuery(['Statuses' => $statuses]); //CSV string
        return $this;
    }

    /**
     * @param string $where
     * @return $this
     */

    public function where(string $where)
    {
        $this->addToQuery(['where' > $where]);
        return $this;
    }

    /**
     * @param string $orderBy
     * @param string|null $direction
     * @return $this
     */

    public function orderBy(string $orderBy, string $direction = null)
    {
        $orderParameter = $direction ? $orderBy . ' ' . $direction : $orderBy;
        $this->addToQuery(['order' => $orderParameter]);
        return $this;
    }

    /**
     * @param int $page
     * @return $this
     */

    public function page(int $page)
    {
        $this->addToQuery(['page' => $page]);
        return $this;
    }

    /**
     * @param null $identifier
     * @return string
     */

    public function get($identifier = null)  //Identifier can be either GUID (E.g 00000000-0000-0000-0000-00000000) or Invoice Number (E.g. INV-0154)
    {
        if ($identifier) {
            return $this->sendRequest('GET', 'invoices/' . $identifier);
        }
        return $this->sendRequest('GET', 'invoices', $this->parameters);
    }

    /**
     * @param $xml
     * @return string
     */

    public function create($xml)
    {
        return $this->sendRequest('POST', 'invoices', '[]', '');
    }

    /**
     * @param string $identifier
     * @param $xml
     * @return string
     */

    public function update(string $identifier, $xml)
    {
        return $this->sendRequest('POST', 'invoices/'.$identifier, '[]', '');
    }

    /**
     * @param string $identifier
     * @param string $identifierType guid or number
     * @return string
     */

    public function delete(string $identifier, string $identifierType = 'guid')
    {
        $this->voidOrDelete('DELETE', 'invoice', $identifier, $identifierType);
    }

    /**
     * @param string $identifier
     * @param string $identifierType
     */

    public function void(string $identifier, string $identifierType = 'guid')
    {
        $this->voidOrDelete('VOID', 'invoice', $identifier, $identifierType);
    }
}