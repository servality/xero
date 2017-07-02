<?php

namespace Xero\accounting;

use Xero\accounting\filters\OrderByFilter;
use Xero\accounting\filters\WhereFilter;

class ContactGroups  extends AccountingBase implements
    WhereFilter,
    OrderByFilter
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

    public function get($identifier = null)
    {
        if ($identifier) {
            return $this->sendRequest('GET', 'ContactGroups/' . $identifier);
        }
        return $this->sendRequest('GET', 'ContactGroups');
    }
}