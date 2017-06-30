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
     * @param null $identifier
     * @return string
     */

    public function get($identifier = null)  //Identifier can be either GUID (E.g 00000000-0000-0000-0000-00000000) or Invoice Number (E.g. INV-0154)
    {
        if ($identifier) {
            return $this->sendRequest('GET', 'Invoices/' . $identifier);
        }
        return $this->sendRequest('GET', 'Invoices', $this->parameters);
    }

    /**
     * @param string $xml
     * @return string
     */

    public function create(string $xml)
    {
        return $this->sendRequest('POST', 'Invoices', [], '');
    }

    /**
     * @param string $identifier
     * @param string $xml
     * @return string
     */

    public function update(string $identifier, string $xml)
    {
        return $this->sendRequest('POST', 'Invoices/'.$identifier, [], '');
    }

    /**
     * @param string $identifier
     * @param string $identifierType guid or number
     * @return string
     */

    public function delete(string $identifier, string $identifierType = 'guid')
    {
        $this->voidOrDelete('DELETE', 'Invoice', $identifier, $identifierType);
    }

    /**
     * @param string $identifier
     * @param string $identifierType
     */

    public function void(string $identifier, string $identifierType = 'guid')
    {
        $this->voidOrDelete('VOID', 'Invoice', $identifier, $identifierType);
    }
}