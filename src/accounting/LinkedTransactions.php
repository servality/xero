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

    /**
     * @param string $sourceTransactionID
     * @param string $sourceLineItemID
     * @param string|null $contactID
     * @param string|null $targetTransactionID
     * @param string|null $targetLineItemID
     * @return string
     */
    public function create(
        string $sourceTransactionID,
        string $sourceLineItemID,
        string $contactID = null,
        string $targetTransactionID = null,
        string $targetLineItemID = null
    )
    {

        $xmlContactID = $contactID ? '<ContactID>73d15ee0-27db-4352-ac8d-28463a2110f4</ContactID>' : null;
        $xmlTargetTransactionID = $targetTransactionID ? '<TargetTransactionID>2e926f7b-022c-44d3-8a9a-a5201dd37b61</TargetTransactionID>' : null;
        $xmlTargetLineItemID = $targetLineItemID ? '<TargetLineItemID>43c944b5-1556-42d6-aa35-b3a60f6c0a49</TargetLineItemID>' : null;

        $xml = '
            <LinkedTransaction>
                <SourceTransactionID>' . $sourceTransactionID . '</SourceTransactionID>
                <SourceLineItemID>' . $sourceLineItemID . '</SourceLineItemID>    
        ';

        $xml = $xmlContactID ? $xml . $xmlContactID : $xml;
        $xml = $xmlTargetTransactionID ? $xml . $xmlTargetTransactionID : $xml;
        $xml = $xmlTargetLineItemID ? $xml . $xmlTargetLineItemID : $xml;

        $xml = $xml . '</LinkedTransaction>';

        return $this->sendRequest('POST', 'LinkedTransactions', $xml);
    }

    /**
     * @param string $identifier
     * @param string $data
     * @return string
     */
    public function update(string $identifier, string $data)
    {
        return $this->sendRequest('POST', 'LinkedTransactions/' . $identifier, $data);
    }

    /**
     * @param string $identifier
     * @return string
     */
    public function delete(string $identifier)
    {
        return $this->sendRequest('DELETE', 'LinkedTransactions/' . $identifier);
    }
}