<?php

namespace Xero\accounting\filters;

/**
 * Trait FilterHelper
 * @package Xero\accounting\filters
 */
trait AccountingFilterHelper
{
    /**
     * @param string $timestamp
     * @return array
     */
    public function modifiedAfterHeader(string $timestamp){
        return ['If-Modified-Since' => $timestamp];
    }

    /**
     * @param string $where
     * @return array
     */
    protected function whereParameter(string $where){
        return ['where' => $where];
    }

    /**
     * @param string $orderBy
     * @param string|null $direction
     * @return array
     */
    protected function orderParameter(string $orderBy, string $direction = null){
        $orderParameter = $direction ? $orderBy . ' ' . $direction : $orderBy;
        return ['order' => $orderParameter];
    }

    /**
     * @param int $page
     * @return array
     */
    protected function pageParameter(int $page){
        return ['page' => $page];
    }

    /**
     * @param string $ids
     * @return array
     */
    protected function idsParameter(string $ids){
        return ['IDs' => $ids];
    }

    /**
     * @param bool $include
     * @return array
     */
    protected function includeArchivedParameter(bool $include){
        return ['includeArchived' => $include];
    }

    /**
     * @param string $invoiceNumbers
     * @return array
     */
    protected function invoiceNumbersParameter(string $invoiceNumbers){
        return ['InvoiceNumbers' => $invoiceNumbers];
    }

    /**
     * @param string $contactIds
     * @return array
     */
    protected function contactIdsParameter(string $contactIds){
        return ['contactIDs' => $contactIds];
    }

    /**
     * @param string $statuses
     * @return array
     */
    protected function statusesParameter(string $statuses){
        return ['Statuses' => $statuses];
    }

    /**
     * @param string $offset
     * @return array
     */
    protected function offsetParameter(string $offset){
        return ['offset' => $offset];
    }

    /**
     * @param bool $paymentsOnly
     * @return array
     */
    protected function paymentsOnlyParameter(bool $paymentsOnly){
        return ['paymentsOnly' => $paymentsOnly];
    }

    /**
     * @param string $sourceTransactionId
     * @return array
     */
    protected function sourceTransactionIdParameter(string $sourceTransactionId){
        return ['SourceTransactionID' => $sourceTransactionId];
    }

    /**
     * @param string $contactId
     * @return array
     */
    protected function contactIdParameter(string $contactId){
        return ['ContactID' => $contactId];
    }

    /**
     * @param string $contactId
     * @param string $status
     * @return array
     */
    protected function contactIdAndStatusParameter(string $contactId, string $status){
        return ['ContactID' => $contactId, 'Status' => $status];
    }

    /**
     * @param string $targetTransactionId
     * @return array
     */
    protected function targetTransactionIdParameter(string $targetTransactionId){
        return ['TargetTransactionId' => $targetTransactionId];
    }

    /**
     * @param string $status
     * @return array
     */
    protected function statusParameter(string $status){
        return ['Status' => $status];
    }

    /**
     * @param string $dateFrom
     * @param string $dateTo
     * @return array
     */
    protected function dateFromAndDateToParameter(string $dateFrom, string $dateTo){
        return ['DateFrom' => $dateFrom, 'DateTo' => $dateTo];
    }

    /**
     * @param string $taxType
     * @return array
     */
    protected function taxTypeParameter(string $taxType){
        return ['TaxType' => $taxType];
    }

    /**
     * @param string $date
     * @return array
     */
    protected function dateParameter(string $date){
        return ['Date' => $date];
    }

    /**
     * @param string $date
     * @return array
     */
    protected function fromDateParameter(string $date){
        return ['fromDate' => $date];
    }

    /**
     * @param string $date
     * @return array
     */
    protected function toDateParameter(string $date){
        return ['toDate' => $date];
    }

    /**
     * @param string $id
     * @return array
     */
    protected function trackingOptionId1Parameter(string $id){
        return ['trackingOptionID1' => $id];
    }

    /**
     * @param string $id
     * @return array
     */
    protected function trackingOptionId2Parameter(string $id){
        return ['trackingOptionID2' => $id];
    }

    /**
     * @param bool $standardLayout
     * @return array
     */
    protected function standardLayoutParameter(bool $standardLayout){
        return ['standardLayout' => $standardLayout];
    }

    /**
     * @param string $id
     * @return array
     */
    protected function bankAccountIdParameter(string $id){
        return ['bankAccountID' => $id];
    }

    /**
     * @param int $periods - The number of periods to compare (integer between 1 and 12)
     * @return array
     */
    protected function periodsParameter(int $periods){
        return ['periods' => $periods];
    }

    /**
     * @param int $timeFrame - The period size to compare to (1=month, 3=quarter, 12=year)
     * @return array
     */
    protected function timeFrameParameter(int $timeFrame){
        return ['timeframe' => $timeFrame];
    }

    /**
     * @param string $id
     * @return array
     */
    protected function trackingCategoryIdParameter(string $id){
        return ['trackingCategoryID' => $id];
    }

    /**
     * @param string $id
     * @return array
     */
    protected function trackingOptionIdParameter(string $id){
        return ['trackingOptionID' => $id];
    }
}