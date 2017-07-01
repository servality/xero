<?php

namespace Xero\accounting;

use Xero\accounting\filters\AccountingFilterHelper;
use Xero\accounting\filters\ContactIDs;
use Xero\accounting\filters\IdsFilter;
use Xero\accounting\filters\InvoiceNumbersFilter;
use Xero\accounting\filters\ModifiedAfterFilter;
use Xero\accounting\filters\OrderByFilter;
use Xero\accounting\filters\PageFilter;
use Xero\accounting\filters\StatusesFilter;
use Xero\accounting\filters\WhereFilter;

class Invoices extends AccountingBase implements
    ModifiedAfterFilter,
    WhereFilter,
    OrderByFilter,
    PageFilter,
    IdsFilter,
    InvoiceNumbersFilter,
    ContactIDs,
    StatusesFilter
{
    use AccountingFilterHelper;

    /**
     * Invoices constructor.
     * @param $config
     */
    function __construct($config)
    {
        parent::__construct($config);
    }

    /**
     * @param null $identifier
     * @return string
     */
    public function get($identifier = null)
    {
        if ($identifier) {
            return $this->sendRequest('GET', 'Invoices/' . $identifier);
        }

        return $this->sendRequest('GET', 'Invoices');
    }

    /**
     * @param string $xml
     * @return string
     */
    public function create(string $xml)
    {
        return $this->sendRequest('POST', 'Invoices', '');
    }

    /**
     * @param string $identifier
     * @param string $xml
     * @return string
     */
    public function update(string $identifier, string $xml)
    {
        return $this->sendRequest('POST', 'Invoices/' . $identifier, '');
    }

    /**
     * @param string $identifier
     * @param string $identifierType guid or number
     * @return string
     */
    public function delete(string $identifier, string $identifierType = 'guid')
    {
        return $this->voidOrDelete('DELETE', 'Invoice', $identifier, $identifierType);
    }

    /**
     * @param string $identifier
     * @param string $identifierType
     */
    public function void(string $identifier, string $identifierType = 'guid')
    {
        $this->voidOrDelete('VOID', 'Invoice', $identifier, $identifierType);
    }

    /**
     * @param string $timestamp
     * @return $this
     */
    public function modifiedAfter(string $timestamp)
    {
        $this->addToHeaders($this->modifiedAfterHeader($timestamp));

        return $this;
    }

    /**
     * @param string $where
     * @return $this
     */
    public function where(string $where)
    {
        $this->addToQuery($this->whereParameter($where));

        return $this;
    }

    /**
     * @param string $ids
     * @return $this
     */
    public function contactIds(string $ids)
    {
        $this->addToQuery($this->contactIdsParameter($ids));

        return $this;
    }

    /**
     * @param string $ids
     * @return $this
     */
    public function ids(string $ids)
    {
        $this->addToQuery($this->idsParameter($ids));

        return $this;
    }

    /**
     * @param string $numbers
     * @return $this
     */
    public function invoiceNumbers(string $numbers)
    {
        $this->addToQuery($this->invoiceNumbersParameter($numbers));

        return $this;
    }

    /**
     * @param string $orderBy
     * @param string|null $direction
     * @return $this
     */
    public function orderBy(string $orderBy, string $direction = null)
    {
        $this->addToQuery($this->orderParameter($orderBy, $direction));

        return $this;
    }

    /**
     * @param int $page
     * @return $this
     */
    public function page(int $page)
    {
        $this->addToQuery($this->pageParameter($page));

        return $this;
    }

    /**
     * @param string $statuses
     * @return $this
     */
    public function statuses(string $statuses)
    {
        $this->addToQuery($this->statusesParameter($statuses));

        return $this;
    }
}