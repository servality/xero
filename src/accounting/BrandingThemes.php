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
     * @param null $identifier
     * @return string
     */
    public function get($identifier = null)
    {
        if ($identifier) {
            return $this->sendRequest('GET', 'BrandingThemes/' . $identifier);
        }
        return $this->sendRequest('GET', 'BrandingThemes');
    }
}