<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 1/07/2017
 * Time: 12:03 PM
 */

namespace Xero\accounting;


use Xero\accounting\filters\ModifiedAfterFilter;
use Xero\accounting\filters\OrderByFilter;
use Xero\accounting\filters\PageFilter;
use Xero\accounting\filters\WhereFilter;

class CreditNotes extends AccountingBase implements
    ModifiedAfterFilter,
    WhereFilter,
    OrderByFilter,
    PageFilter
{

}