<?php

namespace Xero\accounting;

use Xero\accounting\filters\ModifiedAfterFilter;
use Xero\accounting\filters\OrderByFilter;
use Xero\accounting\filters\PageFilter;
use Xero\accounting\filters\SummarizeErrors;
use Xero\accounting\filters\WhereFilter;

class BankTransactions extends AccountingBase implements
    ModifiedAfterFilter,
    WhereFilter,
    OrderByFilter,
    PageFilter,
    SummarizeErrors
{

    /**
     * BankTransactions constructor.
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
     * @param string|null $identifier
     * @return string
     */
    public function get(string $identifier = null)
    {
        if ($identifier) {
            return $this->sendRequest('GET', 'BankTransactions/' . $identifier);
        }
        return $this->sendRequest('GET', 'BankTransactions');
    }

    /**
     * @param string $data
     * @return string
     */
    public function create(string $data)
    {
        return $this->sendRequest('PUT', 'BankTransactions', $data);
    }

    /**
     * @param string $identifier
     * @param string $data
     * @return string
     */
    public function update(string $identifier, string $data)
    {
        return $this->sendRequest('POST', 'BankTransactions/' . $identifier, $data);
    }

    /**
     * @param string $identifier
     * @return string
     */
    public function delete(string $identifier)
    {
        return $this->updateStatus('BankTransaction', $identifier, 'DELETED');
    }
}