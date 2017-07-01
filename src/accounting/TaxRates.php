<?php

namespace Xero\accounting;

use Xero\accounting\filters\OrderByFilter;
use Xero\accounting\filters\TaxType;
use Xero\accounting\filters\WhereFilter;

class TaxRates extends AccountingBase implements
    WhereFilter,
    OrderByFilter,
    TaxType
{

}