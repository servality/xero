<?php

namespace Xero\accounting;

use Xero\accounting\filters\OrderByFilter;
use Xero\accounting\filters\TaxTypeFilter;
use Xero\accounting\filters\WhereFilter;

/**
 * Class TaxRates
 * @package Xero\accounting
 */
class TaxRates extends AccountingBase implements
    WhereFilter,
    OrderByFilter,
    TaxTypeFilter
{

    /**
     * TaxRates constructor.
     * @param array $config
     */
    function __construct($config)
    {
        parent::__construct($config);
    }

    /**
     * @param string $orderBy
     * @param string|null $direction
     * @return $this
     */
    public function orderBy(string $orderBy, string $direction = null)
    {
        $this->addToQuery($this->orderParameter($orderBy, $direction));

        return $this;
    }

    /**
     * @param $type
     * @return $this
     */
    public function taxType($type)
    {
        $this->addToQuery($this->taxTypeParameter($type));

        return $this;
    }

    /**
     * @param string $where
     * @return $this
     */
    public function where(string $where)
    {
        $this->addToQuery($this->whereParameter($where));

        return $this;
    }

    /**
     * @return string
     */
    public function get()
    {
        return $this->sendRequest('GET', 'TaxRates');
    }

    /**
     * @param string $data
     * @return string
     */
    public function create(string $data)
    {
        return $this->sendRequest('POST', 'TaxRates', $data);
    }

    /**
     * @param string $data
     * @return string
     */
    public function update(string $data)
    {
        return $this->sendRequest('POST', 'TaxRates', $data);
    }

    /**
     * @param string $name
     * @return string
     */
    public function delete(string $name)
    {
        $xml = '
            <TaxRates>
                <TaxRate>
                    <Name>' . $name . '</Name>
                    <Status>DELETED</Status>
                </TaxRate>
            </TaxRates>
        ';

        return $this->sendRequest('POST', 'TaxRates', $xml);
    }
}