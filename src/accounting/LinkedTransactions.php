<?php

namespace Xero\accounting;

use Xero\accounting\filters\ContactIDFilter;
use Xero\accounting\filters\ContactIDAndStatusFilter;
use Xero\accounting\filters\PageFilter;
use Xero\accounting\filters\SourceTransactionIDFilter;
use Xero\accounting\filters\TargetTransactionIDFilter;

class LinkedTransactions extends AccountingBase implements
    PageFilter,
    SourceTransactionIDFilter,
    ContactIDFilter,
    ContactIDAndStatusFilter,
    TargetTransactionIDFilter
{

    function __construct($config)
    {
        parent::__construct($config);
    }

    public function contactIdAndStatus(string $contactId, string $status)
    {
        $this->addToQuery($this->contactIdAndStatusParameter($contactId, $status));

        return $this;
    }

    public function contactId(string $id)
    {
        $this->addToQuery($this->contactIdParameter($id));

        return $this;
    }

    public function page(int $page)
    {
        $this->addToQuery($this->pageParameter($page));

        return $this;
    }

    public function sourceTransactionId($id)
    {
        $this->addToQuery($this->sourceTransactionIdParameter($id));

        return $this;
    }

    public function targetTransactionID($id)
    {
        $this->addToQuery($this->targetTransactionIdParameter($id));

        return $this;
    }

    public function get($identifier = null)
    {
        if ($identifier) {
            return $this->sendRequest('GET', 'LinkedTransactions/' . $identifier);
        }
        return $this->sendRequest('GET', 'LinkedTransactions');
    }
}