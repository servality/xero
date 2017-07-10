<?php

namespace Xero\accounting;

use Xero\accounting\filters\OrderByFilter;
use Xero\accounting\filters\SummarizeErrors;
use Xero\accounting\filters\WhereFilter;

/**
 * Class ContactGroups
 * @package Xero\accounting
 */
class ContactGroups extends AccountingBase implements
    WhereFilter,
    OrderByFilter,
    SummarizeErrors
{

    /**
     * ContactGroups constructor.
     * @param array $config
     */
    function __construct($config)
    {
        parent::__construct($config);
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
            return $this->sendRequest('GET', 'ContactGroups/' . $identifier);
        }
        return $this->sendRequest('GET', 'ContactGroups');
    }

    /**
     * @param string $data
     * @return string
     */
    public function create(string $data)
    {
        return $this->sendRequest('POST', 'ContactGroups/', $data);
    }

    /**
     * @param string $groupIdentifier
     * @param string $data
     * @return string
     */
    public function update(string $groupIdentifier, string $data)
    {
        return $this->sendRequest('POST', 'ContactGroups/' . $groupIdentifier, $data);
    }

    /**
     * @param string $groupIdentifier
     * @param string $data
     * @return string
     */
    public function addContacts(string $groupIdentifier, string $data)
    {
        return $this->sendRequest('PUT', 'ContactGroups/' . $groupIdentifier . '/Contacts', $data);
    }

    /**
     * @param string $groupIdentifier
     * @param string $contactIdentifier
     * @return string
     */
    public function deleteContact(string $groupIdentifier, string $contactIdentifier)
    {
        return $this->sendRequest('DELETE', 'ContactGroups/' . $groupIdentifier . '/Contacts/' . $contactIdentifier);
    }

    /**
     * @param string $groupIdentifier
     * @return string
     */
    public function deleteAllContacts(string $groupIdentifier)
    {
        return $this->sendRequest('DELETE', 'ContactGroups/' . $groupIdentifier . '/Contacts');
    }
}