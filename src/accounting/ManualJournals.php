<?php

namespace Xero\accounting;

use Xero\accounting\filters\ModifiedAfterFilter;
use Xero\accounting\filters\OrderByFilter;
use Xero\accounting\filters\PageFilter;
use Xero\accounting\filters\WhereFilter;

/**
 * Class ManualJournals
 * @package Xero\accounting
 */
class ManualJournals extends AccountingBase implements
    ModifiedAfterFilter,
    WhereFilter,
    OrderByFilter,
    PageFilter
{

    /**
     * ManualJournals constructor.
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
     * @param null $identifier
     * @return string
     */
    public function get(string $identifier = null)
    {
        if ($identifier) {
            return $this->sendRequest('GET', 'ManualJournals/' . $identifier);
        }
        return $this->sendRequest('GET', 'ManualJournals');
    }

    /**
     * @param string $data
     * @return string
     */
    public function create(string $data)
    {
        return $this->sendRequest('POST', 'ManualJournals', $data);
    }

    /**
     * @param string $identifier
     * @param string $data
     * @return string
     */
    public function update(string $identifier, string $data)
    {
        return $this->sendRequest('POST', 'ManualJournals/' . $identifier, $data);
    }
}