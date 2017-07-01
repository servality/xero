<?php

namespace Xero\accounting;

use Xero\accounting\filters\DateFromAndDateTo;
use Xero\accounting\filters\ModifiedAfterFilter;
use Xero\accounting\filters\OrderByFilter;
use Xero\accounting\filters\PageFilter;
use Xero\accounting\filters\Status;

class PurchaseOrders extends AccountingBase implements
    ModifiedAfterFilter,
    OrderByFilter,
    PageFilter,
    Status,
    DateFromAndDateTo
{

}