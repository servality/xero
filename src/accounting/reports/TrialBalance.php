<?php

namespace Xero\accounting\reports;

use Xero\accounting\AccountingBase;
use Xero\accounting\filters\DateFilter;
use Xero\accounting\filters\PaymentsOnlyFilter;

class TrialBalance extends AccountingBase implements
    DateFilter,
    PaymentsOnlyFilter
{

}