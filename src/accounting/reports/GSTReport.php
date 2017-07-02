<?php

namespace Xero\accounting\reports;

use Xero\accounting\AccountingBase;

class GSTReport extends AccountingBase
{
    function __construct(array $config)
    {
        parent::__construct($config);
    }

    public function get($identifier = null)
    {
        if ($identifier) {
            return $this->sendRequest('GET', 'Reports/' . $identifier);
        }
        return $this->sendRequest('GET', 'Reports');
    }
}