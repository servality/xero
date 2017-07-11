<?php

namespace Xero\accounting;

use Xero\accounting\filters\ModifiedAfterFilter;
use Xero\accounting\filters\OrderByFilter;
use Xero\accounting\filters\SummarizeErrors;
use Xero\accounting\filters\WhereFilter;

/**
 * Class Payments
 * @package Xero\accounting
 */
class Payments extends AccountingBase implements
    ModifiedAfterFilter,
    WhereFilter,
    OrderByFilter,
    SummarizeErrors
{

    /**
     * Payments constructor.
     * @param array $config
     */
    function __construct($config)
    {
        parent::__construct($config);
    }

    /**
     * @param string $timestamp
     * @return $this
     */
    public function modifiedAfter(string $timestamp)
    {
        $this->addToHeaders($this->modifiedAfterHeader($timestamp));

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
            return $this->sendRequest('GET', 'Payments/' . $identifier);
        }
        return $this->sendRequest('GET', 'Payments');
    }

    /**
     * @param string $invoiceID
     * @param string $accountIdentifierType
     * @param string $accountIdentifier
     * @param string $date
     * @param string $amount
     * @param bool $isReconciled
     * @return string
     */
    public function applyOne(
        string $invoiceID,
        string $accountIdentifierType,
        string $accountIdentifier,
        string $date,
        string $amount,
        bool $isReconciled = false
    )
    {
        $accountIdentifierType = $accountIdentifierType == "Code" ? 'Code' : 'AccountID';

        $xml = '
            <Payments>
                <Payment>
                    <Invoice>
                        <InvoiceID>' . $invoiceID . '</InvoiceID>
                    </Invoice>
                    <Account>
                        <' . $accountIdentifierType . '>' . $accountIdentifier . '</' . $accountIdentifierType . '>
                    </Account>
                    <Date>' . $date . '</Date>
                    <Amount>' . $amount . '</Amount>
                    <IsReconciled>' . $isReconciled . '</IsReconciled>
                </Payment>
            </Payments>
        ';

        return $this->sendRequest('POST', 'Payments', $xml);
    }

    /**
     * Multiple payments
     * @param $data
     * @return string
     */
    public function apply($data)
    {
        return $this->sendRequest('POST', 'Payments', $data);
    }

    /**
     * @param string $CreditNoteID
     * @param string $accountIdentifierType
     * @param string $accountIdentifier
     * @param string $date
     * @param string $amount
     * @param string $reference
     * @return string
     */
    public function creditNoteRefund(
        string $CreditNoteID,
        string $accountIdentifierType,
        string $accountIdentifier,
        string $date,
        string $amount,
        string $reference
    )
    {
        $accountIdentifierType = $accountIdentifierType == "Code" ? 'Code' : 'AccountID';

        $xml = '
            <Payments>
                <Payment>
                    <CreditNote>
                        <CreditNoteID>' . $CreditNoteID . '</CreditNoteID>
                    </CreditNote>
                    <Account>
                        <' . $accountIdentifierType . '>' . $accountIdentifier . '</' . $accountIdentifierType . '>
                    </Account>
                    <Date>' . $date . '</Date>
                    <Amount>' . $amount . '</Amount>
                    <Reference>' . $reference . '</Reference>
                </Payment>
            </Payments>
        ';

        return $this->sendRequest('GET', 'Payments', $xml);
    }

    /**
     * @param string $prepaymentID
     * @param string $accountIdentifierType
     * @param string $accountIdentifier
     * @param string $date
     * @param string $amount
     * @param string $reference
     * @return string
     */
    public function prepaymentRefund(
        string $prepaymentID,
        string $accountIdentifierType,
        string $accountIdentifier,
        string $date,
        string $amount,
        string $reference
    )
    {
        $xml = '
            <Payments>
                <Payment>
                    <Prepayment>
                        <PrepaymentID>' . $prepaymentID . '</PrepaymentID>
                    </Prepayment>
                    <Account>
                        <' . $accountIdentifierType . '>' . $accountIdentifier . '</' . $accountIdentifierType . '>
                    </Account>
                    <Date>' . $date . '</Date>
                    <Amount>' . $amount . '</Amount>
                    <Reference>' . $reference . '</Reference>
                </Payment>
            </Payments>
        ';

        return $this->sendRequest('GET', 'Payments', $xml);
    }

    /**
     * @param string $overpaymentID
     * @param string $accountIdentifierType
     * @param string $accountIdentifier
     * @param string $date
     * @param string $amount
     * @param string $reference
     * @return string
     */
    public function overpaymentRefund(
        string $overpaymentID,
        string $accountIdentifierType,
        string $accountIdentifier,
        string $date,
        string $amount,
        string $reference
    )
    {
        $xml = '
            <Payments>
                <Payment>
                    <Prepayment>
                        <OverpaymentID>' . $overpaymentID . '</OverpaymentID>
                    </Prepayment>
                    <Account>
                        <' . $accountIdentifierType . '>' . $accountIdentifier . '</' . $accountIdentifierType . '>
                    </Account>
                    <Date>' . $date . '</Date>
                    <Amount>' . $amount . '</Amount>
                    <Reference>' . $reference . '</Reference>
                </Payment>
            </Payments>
        ';

        return $this->sendRequest('GET', 'Payments', $xml);
    }

    /**
     * @param string $identifier
     * @return string
     */
    public function delete(string $identifier)
    {
        $xml = '
            <Payments>
                <Payment>
                    <Status>DELETED</Status>
                </Payment>
            </Payments>
        ';

        return $this->sendRequest('GET', 'Payments/' . $identifier, $xml);
    }
}