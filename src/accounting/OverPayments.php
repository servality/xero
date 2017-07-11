<?php

namespace Xero\accounting;

use Xero\accounting\filters\ModifiedAfterFilter;
use Xero\accounting\filters\OrderByFilter;
use Xero\accounting\filters\PageFilter;
use Xero\accounting\filters\SummarizeErrors;
use Xero\accounting\filters\WhereFilter;

/**
 * Class OverPayments
 * @package Xero\accounting
 */
class OverPayments extends AccountingBase implements
    ModifiedAfterFilter,
    WhereFilter,
    OrderByFilter,
    PageFilter,
    SummarizeErrors
{

    /**
     * OverPayments constructor.
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
    public function get(string $identifier = null)
    {
        if ($identifier) {
            return $this->sendRequest('GET', 'Overpayments/' . $identifier);
        }
        return $this->sendRequest('GET', 'Overpayments');
    }

    /**
     * @param string $identifier
     * @param string $invoiceID
     * @param int $appliedAmount
     * @return string
     */
    public function allocate(string $identifier, string $invoiceID, int $appliedAmount){

        $xml = '
            <Allocations>
                <Allocation>
                    <AppliedAmount>'.$appliedAmount.'</AppliedAmount>
                        <Invoice>
                            <InvoiceID>'.$invoiceID.'</InvoiceID>
                        </Invoice>
                </Allocation>
            </Allocations>
        ';

        return $this->sendRequest('PUT', 'Overpayments/' . $identifier.'/Allocations', $xml);
    }
}