<?php

namespace Xero\accounting;


use Xero\accounting\filters\ModifiedAfterFilter;
use Xero\accounting\filters\OrderByFilter;
use Xero\accounting\filters\PageFilter;
use Xero\accounting\filters\SummarizeErrors;
use Xero\accounting\filters\WhereFilter;

/**
 * Class CreditNotes
 * @package Xero\accounting
 */
class CreditNotes extends AccountingBase implements
    ModifiedAfterFilter,
    WhereFilter,
    OrderByFilter,
    PageFilter,
    SummarizeErrors
{

    /**
     * CreditNotes constructor.
     * @param array $config
     */
    function __construct($config)
    {
        parent::__construct($config);
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
     * @param string $where
     * @return $this
     */
    public function where(string $where)
    {
        $this->addToQuery($this->whereParameter($where));

        return $this;
    }

    /**
     * @param bool $summarizeErrors
     * @return $this
     */
    public function SummarizeErrors(bool $summarizeErrors = false)
    {
        $this->addToQuery($this->summarizeErrorsParameter($summarizeErrors));

        return $this;
    }

    /**
     * @param null $identifier
     * @return string
     */
    public function get($identifier = null)
    {
        if ($identifier) {
            return $this->sendRequest('GET', 'CreditNotes/' . $identifier);
        }
        return $this->sendRequest('GET', 'CreditNotes');
    }

    /**
     * @param string $data
     * @return string
     */
    public function create(string $data)
    {
        return $this->sendRequest('PUT', 'CreditNotes', $data);
    }

    /**
     * @param string $identifier
     * @param string $data
     * @return string
     */
    public function update(string $identifier, string $data)
    {
        return $this->sendRequest('POST', 'CreditNotes/'.$identifier, $data);
    }

    /**
     * @param string $identifier
     * @param string $invoiceIdentifier
     * @param int $appliedAmount
     * @return string
     */
    public function allocate(string $identifier, string $invoiceIdentifier, int $appliedAmount)
    {
        $xml = '
            <Allocations>
              <Allocation>
                <AppliedAmount>'.$appliedAmount.'</AppliedAmount>
                <Invoice>
                  <InvoiceID>'.$invoiceIdentifier.'</InvoiceID>
                </Invoice>
              </Allocation>
            </Allocations>';

        return $this->sendRequest('POST', 'CreditNotes/'.$identifier.'/Allocations', $xml);
    }
}