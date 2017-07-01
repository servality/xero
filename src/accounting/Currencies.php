<?php

namespace Xero\accounting;

use Xero\accounting\filters\OrderByFilter;
use Xero\accounting\filters\WhereFilter;

class Currencies extends AccountingBase implements
    WhereFilter,
    OrderByFilter
{

}