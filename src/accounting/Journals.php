<?php

namespace Xero\accounting;

use Xero\accounting\filters\ModifiedAfterFilter;
use Xero\accounting\filters\OffsetFilter;
use Xero\accounting\filters\PaymentsOnlyFilter;

class Journals extends AccountingBase implements
    ModifiedAfterFilter,
    OffsetFilter,
    PaymentsOnlyFilter
{

}