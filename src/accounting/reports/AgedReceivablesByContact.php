<?php

namespace Xero\accounting\reports;

use Xero\accounting\AccountingBase;
use Xero\accounting\filters\ContactIDFilter;
use Xero\accounting\filters\DateFilter;
use Xero\accounting\filters\FromDateFilter;
use Xero\accounting\filters\ToDateFilter;

class AgedReceivablesByContact extends AccountingBase implements
    ContactIDFilter,
    DateFilter,
    FromDateFilter,
    ToDateFilter
{

}