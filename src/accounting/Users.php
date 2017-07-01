<?php

namespace Xero\accounting;

use Xero\accounting\filters\ModifiedAfterFilter;
use Xero\accounting\filters\OrderByFilter;
use Xero\accounting\filters\WhereFilter;

class Users extends AccountingBase implements
    ModifiedAfterFilter,
    WhereFilter,
    OrderByFilter
{

}