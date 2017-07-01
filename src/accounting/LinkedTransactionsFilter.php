<?php

namespace Xero\accounting;


use Xero\accounting\filters\ContactIDFilter;
use Xero\accounting\filters\ContactIDAndStatusFilter;
use Xero\accounting\filters\PageFilter;
use Xero\accounting\filters\SourceTransactionIDFilter;
use Xero\accounting\filters\TargetTransactionIDFilter;

class LinkedTransactions extends AccountingBase implements
    PageFilter,
    SourceTransactionIDFilter,
    ContactIDFilter,
    ContactIDAndStatusFilter,
    TargetTransactionIDFilter
{

}