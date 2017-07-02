<?php

namespace Xero\accounting;


/**
 * Class BrandingTheme
 * @package Xero\accounting
 */
class BrandingThemes extends AccountingBase
{

    /**
     * BrandingTheme constructor.
     * @param array $config
     */
    function __construct($config)
    {
        parent::__construct($config);
    }

    /**
     * @return mixed
     */
    public function get()
    {
        return $this->sendRequest('GET', 'BrandingThemes');
    }
}