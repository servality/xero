<?php

namespace Xero\accounting\reports;

use Xero\accounting\AccountingBase;
use Xero\accounting\filters\FromDateFilter;
use Xero\accounting\filters\ToDateFilter;

class BankSummary extends AccountingBase implements
    FromDateFilter,
    ToDateFilter
{

}