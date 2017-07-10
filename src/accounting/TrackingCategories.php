<?php

namespace Xero\accounting;

use Xero\accounting\filters\IncludeArchivedFilter;
use Xero\accounting\filters\OrderByFilter;
use Xero\accounting\filters\SummarizeErrors;
use Xero\accounting\filters\WhereFilter;

/**
 * Class TrackingCategories
 * @package Xero\accounting
 */
class TrackingCategories extends AccountingBase implements
    WhereFilter,
    OrderByFilter,
    IncludeArchivedFilter,
    SummarizeErrors
{

    /**
     * TrackingCategories constructor.
     * @param array $config
     */
    function __construct($config)
    {
        parent::__construct($config);
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
            return $this->sendRequest('GET', 'TrackingCategories/' . $identifier);
        }
        return $this->sendRequest('GET', 'TrackingCategories');
    }
}