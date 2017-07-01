<?php

namespace Xero\accounting\reports;

use Xero\accounting\AccountingBase;
use Xero\accounting\filters\DateFilter;
use Xero\accounting\filters\Periods;
use Xero\accounting\filters\TimeFrame;

class BudgetSummary extends AccountingBase implements
    DateFilter,
    Periods,
    TimeFrame
{

}