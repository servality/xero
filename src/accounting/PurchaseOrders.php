<?php

namespace Xero\accounting;

use Xero\accounting\filters\DateFromAndDateToFilter;
use Xero\accounting\filters\ModifiedAfterFilter;
use Xero\accounting\filters\OrderByFilter;
use Xero\accounting\filters\PageFilter;
use Xero\accounting\filters\StatusFilter;
use Xero\accounting\filters\SummarizeErrors;

/**
 * Class PurchaseOrders
 * @package Xero\accounting
 */
class PurchaseOrders extends AccountingBase implements
    ModifiedAfterFilter,
    OrderByFilter,
    PageFilter,
    StatusFilter,
    DateFromAndDateToFilter,
    SummarizeErrors
{

    /**
     * PurchaseOrders constructor.
     * @param array $config
     */
    function __construct($config)
    {
        parent::__construct($config);
    }

    /**
     * @param $dateFrom
     * @param $dateTo
     * @return $this
     */
    public function dateFromAndDateTo($dateFrom, $dateTo)
    {
        $this->addToQuery($this->dateFromAndDateToParameter($dateFrom, $dateTo));

        return $this;
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
     * @param $status
     * @return $this
     */
    public function status($status)
    {
        $this->addToQuery($this->statusParameter($status));

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
     * @param string|null $identifier
     * @return string
     */
    public function get(string $identifier = null)
    {
        if ($identifier) {
            return $this->sendRequest('GET', 'PurchaseOrders/' . $identifier);
        }
        return $this->sendRequest('GET', 'PurchaseOrders');
    }

    /**
     * @param string $data
     * @return string
     */
    public function create(string $data)
    {
        return $this->sendRequest('POST', 'PurchaseOrders', $data);
    }

    /**
     * @param string $identifier
     * @return string
     */
    public function delete(string $identifier)
    {
        return $this->updateStatus('PurchaseOrder', $identifier, 'DELETED');
    }

    /**
     * @param string $identifier
     * @return string
     */
    public function sentToContact(string $identifier)
    {
        $xml = '
            <PurchaseOrder>
                <PurchaseOrderID>' . $identifier . '</PurchaseOrderID>
                <SentToContact>true</SentToContact>
            </PurchaseOrder>
        ';

        return $this->sendRequest('POST', 'PurchaseOrders/' . $identifier, $xml);
    }
}