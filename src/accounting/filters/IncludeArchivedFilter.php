<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 1/07/2017
 * Time: 10:21 AM
 */

namespace Xero\accounting\filters;


interface IncludeArchivedFilter
{
    /**
     * @param bool $includeArchived
     * @return mixed
     */

    public function includeArchived(bool $includeArchived);
}