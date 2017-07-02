<?php

namespace Xero\accounting;

use Xero\accounting\filters\IdsFilter;
use Xero\accounting\filters\IncludeArchivedFilter;
use Xero\accounting\filters\ModifiedAfterFilter;
use Xero\accounting\filters\OrderByFilter;
use Xero\accounting\filters\PageFilter;
use Xero\accounting\filters\WhereFilter;

/**
 * Class Contacts
 * @package Xero\accounting
 */
class Contacts extends AccountingBase implements
    ModifiedAfterFilter,
    WhereFilter,
    OrderByFilter,
    PageFilter,
    IdsFilter,
    IncludeArchivedFilter
{
    /**
     * Contacts constructor.
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
            return $this->sendRequest('GET', 'Contacts/' . $identifier);
        }
        return $this->sendRequest('GET', 'Contacts', $this->parameters);
    }

    /**
     * @param string $xml
     * @return string
     */
    public function create(string $xml)
    {
        return $this->sendRequest('POST', 'Contacts', $xml);
    }

    /**
     * @param string $identifier
     * @param string $xml
     * @return string
     */
    public function update(string $identifier, string $xml)
    {
        return $this->sendRequest('POST', 'Contacts/'.$identifier, $xml);
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
     * @param bool $includeArchived
     * @return $this
     */
    public function includeArchived(bool $includeArchived)
    {
        $this->addToQuery($this->includeArchivedParameter($includeArchived));
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
     * @param string $where
     * @return $this
     */
    public function where(string $where)
    {
        $this->addToQuery($this->whereParameter($where));
        return $this;
    }
}