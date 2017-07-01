<?php

namespace Xero\accounting;


/**
 * Class BrandingTheme
 * @package Xero\accounting
 */
class BrandingTheme extends AccountingBase
{
    /**
     * @return mixed
     */
    public function get()
    {
        return $this->sendRequest('GET', 'BrandingThemes');
    }
}