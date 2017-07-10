<?php

namespace Xero\accounting;

use Xero\accounting\filters\OrderByFilter;
use Xero\accounting\filters\SummarizeErrors;
use Xero\accounting\filters\WhereFilter;

class ContactGroups  extends AccountingBase implements
    WhereFilter,
    OrderByFilter,
    SummarizeErrors
{

    function __construct($config)
    {
        parent::__construct($config);
    }

    public function orderBy(string $orderBy, string $direction = null)
    {
        $this->addToQuery($this->orderParameter($orderBy, $direction));

        return $this;
    }

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

    public function get($identifier = null)
    {
        if ($identifier) {
            return $this->sendRequest('GET', 'ContactGroups/' . $identifier);
        }
        return $this->sendRequest('GET', 'ContactGroups');
    }
}