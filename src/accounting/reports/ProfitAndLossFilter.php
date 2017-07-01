<?php

namespace Xero\accounting\reports;

use Xero\accounting\AccountingBase;
use Xero\accounting\filters\BankAccountId;
use Xero\accounting\filters\FromDateFilter;
use Xero\accounting\filters\PaymentsOnlyFilter;
use Xero\accounting\filters\StandardLayoutFilter;
use Xero\accounting\filters\ToDateFilter;
use Xero\accounting\filters\TrackingCategoryId2Filter;
use Xero\accounting\filters\TrackingCategoryIdFilter;
use Xero\accounting\filters\TrackingOptionId;
use Xero\accounting\filters\TrackingOptionId2;

class ProfitAndLoss extends AccountingBase implements
    FromDateFilter,
    ToDateFilter,
    TrackingOptionId,
    TrackingOptionId2,
    StandardLayoutFilter,
    PaymentsOnlyFilter,
    TrackingCategoryIdFilter,
    TrackingCategoryId2Filter
{

}