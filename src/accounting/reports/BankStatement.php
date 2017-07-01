<?php

namespace Xero\accounting\reports;

use Xero\accounting\AccountingBase;
use Xero\accounting\filters\BankAccountId;
use Xero\accounting\filters\FromDateFilter;
use Xero\accounting\filters\ToDateFilter;

class BankStatement extends AccountingBase implements
    FromDateFilter,
    ToDateFilter,
    BankAccountId
{

}