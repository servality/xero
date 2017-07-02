<?php

namespace Xero\accounting;

use Xero\accounting\filters\ModifiedAfterFilter;
use Xero\accounting\filters\OffsetFilter;
use Xero\accounting\filters\PaymentsOnlyFilter;

class Journals extends AccountingBase implements
    ModifiedAfterFilter,
    OffsetFilter,
    PaymentsOnlyFilter
{

    function __construct($config)
    {
        parent::__construct($config);
    }

    public function modifiedAfter(string $timestamp)
    {
        $this->addToHeaders($this->modifiedAfterHeader($timestamp));

        return $this;
    }

    public function offset(string $offset)
    {
        $this->addToQuery($this->offsetParameter($offset));

        return $this;
    }

    public function paymentsOnly(bool $paymentsOnly = true)
    {
        $this->addToQuery($this->paymentsOnlyParameter($paymentsOnly));

        return $this;
    }

    public function get($identifier = null)
    {
        if ($identifier) {
            return $this->sendRequest('GET', 'Journals/' . $identifier);
        }
        return $this->sendRequest('GET', 'Journals');
    }
}