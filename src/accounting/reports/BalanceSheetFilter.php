<?php

namespace Xero\accounting\reports;

use Xero\accounting\AccountingBase;
use Xero\accounting\filters\DateFilter;
use Xero\accounting\filters\PaymentsOnlyFilter;
use Xero\accounting\filters\StandardLayoutFilter;
use Xero\accounting\filters\TrackingOptionId1;
use Xero\accounting\filters\TrackingOptionId2;

class BalanceSheet extends AccountingBase implements
    DateFilter,
    TrackingOptionId1,
    TrackingOptionId2,
    StandardLayoutFilter,
    PaymentsOnlyFilter
{

}