<?php

namespace Xero\accounting;

use Xero\accounting\filters\ModifiedAfterFilter;
use Xero\accounting\filters\OrderByFilter;
use Xero\accounting\filters\WhereFilter;

class Payments extends AccountingBase implements
    ModifiedAfterFilter,
    WhereFilter,
    OrderByFilter
{

}