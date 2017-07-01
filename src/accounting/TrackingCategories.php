<?php

namespace Xero\accounting;

use Xero\accounting\filters\IncludeArchivedFilter;
use Xero\accounting\filters\OrderByFilter;
use Xero\accounting\filters\WhereFilter;

class TrackingCategories extends AccountingBase implements
    WhereFilter,
    OrderByFilter,
    IncludeArchivedFilter
{

}