<?php

namespace Xero\accounting;


use Xero\accounting\filters\OrderByFilter;
use Xero\accounting\filters\WhereFilter;

class ContactGroups  extends AccountingBase implements
    WhereFilter,
    OrderByFilter
{

}