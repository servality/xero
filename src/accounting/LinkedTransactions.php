<?php

namespace Xero\accounting;

use Xero\accounting\filters\ContactIDFilter;
use Xero\accounting\filters\ContactIDAndStatusFilter;
use Xero\accounting\filters\PageFilter;
use Xero\accounting\filters\SourceTransactionIDFilter;
use Xero\accounting\filters\SummarizeErrors;
use Xero\accounting\filters\TargetTransactionIDFilter;

/**
 * Class LinkedTransactions
 * @package Xero\accounting
 */
class LinkedTransactions extends AccountingBase implements
    PageFilter,
    SourceTransactionIDFilter,
    ContactIDFilter,
    ContactIDAndStatusFilter,
    TargetTransactionIDFilter,
    SummarizeErrors
{

    /**
     * LinkedTransactions constructor.
     * @param array $config
     */
    function __construct($config)
    {
        parent::__construct($config);
    }

    /**
     * @param string $contactId
     * @param string $status
     * @return $this
     */
    public function contactIdAndStatus(string $contactId, string $status)
    {
        $this->addToQuery($this->contactIdAndStatusParameter($contactId, $status));

        return $this;
    }

    /**
     * @param string $id
     * @return $this
     */
    public function contactId(string $id)
    {
        $this->addToQuery($this->contactIdParameter($id));

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
     * @param $id
     * @return $this
     */
    public function sourceTransactionId($id)
    {
        $this->addToQuery($this->sourceTransactionIdParameter($id));

        return $this;
    }

    /**
     * @param $id
     * @return $this
     */
    public function targetTransactionID($id)
    {
        $this->addToQuery($this->targetTransactionIdParameter($id));

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
            return $this->sendRequest('GET', 'LinkedTransactions/' . $identifier);
        }
        return $this->sendRequest('GET', 'LinkedTransactions');
    }
}