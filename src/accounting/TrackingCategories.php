<?php

namespace Xero\accounting;

use Xero\accounting\filters\IncludeArchivedFilter;
use Xero\accounting\filters\OrderByFilter;
use Xero\accounting\filters\SummarizeErrors;
use Xero\accounting\filters\WhereFilter;

/**
 * Class TrackingCategories
 * @package Xero\accounting
 */
class TrackingCategories extends AccountingBase implements
    WhereFilter,
    OrderByFilter,
    IncludeArchivedFilter,
    SummarizeErrors
{

    /**
     * TrackingCategories constructor.
     * @param array $config
     */
    function __construct($config)
    {
        parent::__construct($config);
    }

    /**
     * @param bool $includeArchived
     * @return $this
     */
    public function includeArchived(bool $includeArchived = true)
    {
        $this->addToQuery($this->includeArchivedParameter($includeArchived));

        return $this;
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
     * @param string $where
     * @return $this
     */
    public function where(string $where)
    {
        $this->addToQuery($this->whereParameter($where));

        return $this;
    }

    /**
     * @param bool $summarizeErrors
     * @return $this
     */
    public function SummarizeErrors(bool $summarizeErrors = false)
    {
        $this->addToQuery($this->summarizeErrorsParameter($summarizeErrors));

        return $this;
    }

    /**
     * @param null $identifier
     * @return string
     */
    public function get(string $identifier = null)
    {
        if ($identifier) {
            return $this->sendRequest('GET', 'TrackingCategories/' . $identifier);
        }
        return $this->sendRequest('GET', 'TrackingCategories');
    }

    /**
     * @param string $name
     * @return string
     */
    public function create(string $name)
    {
        $xml = '
            <TrackingCategories>
                <TrackingCategory>
                    <Name>' . $name . '</Name>
                </TrackingCategory>
            </TrackingCategories>
        ';

        return $this->sendRequest('PUT', 'TrackingCategories', $xml);
    }

    /**
     * @param string $categoryID
     * @param string[] ...$names
     * @return string
     */
    public function createOption(string $categoryID, string ...$names)
    {
        $options = null;

        foreach ($names as $name) {
            $options = $options . '<Option><Name>' . $name . '</Name></Option>';
        }

        $xml = '<Options>' . $options . '</Options>';

        return $this->sendRequest('PUT', 'TrackingCategories/' . $categoryID . '/Options', $xml);
    }

    /**
     * @param string $categoryID
     * @param string $name
     * @return string
     */
    public function updateName(string $categoryID, string $name)
    {
        $xml = '
            <TrackingCategories>
                <TrackingCategory>
                    <Name>' . $name . '</Name>
                </TrackingCategory>
            </TrackingCategories>
        ';

        return $this->sendRequest('POST', 'TrackingCategories/' . $categoryID, $xml);
    }

    /**
     * @param string $categoryID
     * @param string $categoryOptionID
     * @param string $name
     * @return string
     */
    public function updateOptionName(string $categoryID, string $categoryOptionID, string $name)
    {
        $xml = '
            <Options>
                <Option>
                    <Name>' . $name . '</Name>
                </Option>
            </Options>
        ';

        return $this->sendRequest('POST', 'TrackingCategories/' . $categoryID . '/Options/' . $categoryOptionID, $xml);
    }

    /**
     * @param string $categoryID
     */
    public function archive(string $categoryID)
    {
        $this->updateStatus('TrackingCategory', $categoryID, 'ARCHIVED');
    }

    /**
     * @param string $categoryID
     * @param string $categoryOptionID
     * @return string
     */
    public function archiveOption(string $categoryID, string $categoryOptionID)
    {
        $xml = '
            <Options>
                <Option>
                    <Status>ARCHIVED</Status>
                </Option>
            </Options>
        ';

        return $this->sendRequest('DELETE', 'TrackingCategories/' . $categoryID . '/Options/' . $categoryOptionID, $xml);
    }

    /**
     * @param string $categoryID
     * @return string
     */
    public function delete(string $categoryID)
    {
        return $this->sendRequest('DELETE', 'TrackingCategories/' . $categoryID);
    }

    /**
     * @param string $categoryID
     * @param string $categoryOptionID
     * @return string
     */
    public function deleteOption(string $categoryID, string $categoryOptionID)
    {
        return $this->sendRequest('DELETE', 'TrackingCategories/' . $categoryID . '/Options/' . $categoryOptionID);
    }
}