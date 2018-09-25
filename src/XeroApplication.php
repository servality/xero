<?php

namespace Xero;

use GuzzleHttp\Subscriber\Oauth\Oauth1;
//General Accounting
use Xero\accounting\Accounts;
use Xero\accounting\BankTransactions;
use Xero\accounting\BankTransfers;
use Xero\accounting\BrandingThemes;
use Xero\accounting\ContactGroups;
use Xero\accounting\Contacts;
use Xero\accounting\CreditNotes;
use Xero\accounting\Currencies;
use Xero\accounting\Employees;
use Xero\accounting\ExpenseClaims;
use Xero\accounting\InvoiceReminders;
use Xero\accounting\Invoices;
use Xero\accounting\Items;
use Xero\accounting\Journals;
use Xero\accounting\LinkedTransactions;
use Xero\accounting\ManualJournals;
use Xero\accounting\Organisation;
use Xero\accounting\OverPayments;
use Xero\accounting\Payments;
use Xero\accounting\PrePayments;
use Xero\accounting\PurchaseOrders;
use Xero\accounting\Receipts;
use Xero\accounting\RepeatingInvoices;
use Xero\accounting\TaxRates;
use Xero\accounting\TrackingCategories;
use Xero\accounting\Users;
//Reports
use Xero\accounting\reports\AgedPayablesByContact;
use Xero\accounting\reports\AgedReceivablesByContact;
use Xero\accounting\reports\BalanceSheet;
use Xero\accounting\reports\BankStatement;
use Xero\accounting\reports\BankSummary;
use Xero\accounting\reports\BASReport;
use Xero\accounting\reports\BudgetSummary;
use Xero\accounting\reports\ExecutiveSummary;
use Xero\accounting\reports\GSTReport;
use Xero\accounting\reports\ProfitAndLoss;
use Xero\accounting\reports\TrialBalance;

/**
 * Class XeroApplication
 * @package Xero
 */
class XeroApplication
{
    /**
     * Xero Request Configuration
     * @var array
     */

    private $config = [
        'oauth' => [
            "consumer_key" => '',
            "consumer_secret" => '',
            'token' => '',
            'token_secret' => '',
            "private_key_file" => '',
            "private_key_passphrase" => '',
            "signature_method" => Oauth1::SIGNATURE_METHOD_RSA
        ],
        'response' => 'json', //json or xml
        'user_agent' => '', //name of application
        'content_type' => 'application/xml' // application/xml | application/json | application/x-www-form-urlencoded
    ];

    /**
     * XeroApplication constructor.
     * @param array $config
     */
    function __construct(array $config)
    {
        //set $configuration values
        foreach ($config as $key => $value) {
            if ($key == 'oauth') {
                foreach ($value as $oauth_key => $oauth_value) {
                    $this->config['oauth'][$oauth_key] = $oauth_value;
                }
                continue;
            }
            $this->config[$key] = $value;
        }
        //copy the consumer_key and consumer_secret tp token and token_secret respectively
        $this->config['oauth']['token'] = $this->config['oauth']['consumer_key'];
        $this->config['oauth']['token_secret'] = $this->config['oauth']['consumer_secret'];
    }

    /**
     * @return Accounts
     */
    public function accounts()
    {
        return new Accounts($this->config);
    }

    /**
     * @return BankTransactions
     */
    public function bankTransactions()
    {
        return new BankTransactions($this->config);
    }

    /**
     * @return BankTransfers
     */
    public function bankTransfers()
    {
        return new BankTransfers($this->config);
    }

    /**
     * @return BrandingThemes
     */
    public function brandingThemes()
    {
        return new BrandingThemes($this->config);
    }

    /**
     * @return ContactGroups
     */
    public function contactGroups()
    {
        return new ContactGroups($this->config);
    }

    /**
     * @return Contacts
     */
    public function contacts()
    {
        return new Contacts($this->config);
    }

    /**
     * @return CreditNotes
     */
    public function creditNotes()
    {
        return new CreditNotes($this->config);
    }

    /**
     * @return Currencies
     */
    public function currencies()
    {
        return new Currencies($this->config);
    }

    /**
     * @return Employees
     */
    public function employees()
    {
        return new Employees($this->config);
    }

    /**
     * @return ExpenseClaims
     */
    public function expenseClaims()
    {
        return new ExpenseClaims($this->config);
    }

    /**
     * @return InvoiceReminders
     */
    public function invoiceReminders()
    {
        return new InvoiceReminders($this->config);
    }

    /**
     * @return Invoices
     */
    public function invoices()
    {
        return new Invoices($this->config);
    }

    /**
     * @return Items
     */
    public function items()
    {
        return new Items($this->config);
    }

    /**
     * @return Journals
     */
    public function journals()
    {
        return new Journals($this->config);
    }

    /**
     * @return LinkedTransactions
     */
    public function linkedTransactions()
    {
        return new LinkedTransactions($this->config);
    }

    /**
     * @return ManualJournals
     */
    public function manualJournals()
    {
        return new ManualJournals($this->config);
    }

    /**
     * @return Organisation
     */
    public function organisation()
    {
        return new Organisation($this->config);
    }

    /**
     * @return OverPayments
     */
    public function overPayments()
    {
        return new OverPayments($this->config);
    }

    /**
     * @return Payments
     */
    public function payments()
    {
        return new Payments($this->config);
    }

    /**
     * @return PrePayments
     */
    public function prePayments()
    {
        return new PrePayments($this->config);
    }

    /**
     * @return PurchaseOrders
     */
    public function purchaseOrders()
    {
        return new PurchaseOrders($this->config);
    }

    /**
     * @return Receipts
     */
    public function receipts()
    {
        return new Receipts($this->config);
    }

    /**
     * @return RepeatingInvoices
     */
    public function repeatingInvoices()
    {
        return new RepeatingInvoices($this->config);
    }

    /**
     * @return TaxRates
     */
    public function taxRates()
    {
        return new TaxRates($this->config);
    }

    /**
     * @return TrackingCategories
     */
    public function trackingCategories()
    {
        return new TrackingCategories($this->config);
    }

    /**
     * @return Users
     */
    public function users()
    {
        return new Users($this->config);
    }

    /**
     * @return AgedPayablesByContact
     */
    public function reportAgedPayableByContact()
    {
        return new AgedPayablesByContact($this->config);
    }

    /**
     * @return AgedReceivablesByContact
     */
    public function reportAgedReceivableByContact()
    {
        return new AgedReceivablesByContact($this->config);
    }

    /**
     * @return BalanceSheet
     */
    public function reportBalanceSheet()
    {
        return new BalanceSheet($this->config);
    }

    /**
     * @return BankStatement
     */
    public function reportBankStatement()
    {
        return new BankStatement($this->config);
    }

    /**
     * @return BankSummary
     */
    public function reportBankSummary()
    {
        return new BankSummary($this->config);
    }

    /**
     * @return BASReport
     */
    public function reportBASReport()
    {
        return new BASReport($this->config);
    }

    /**
     * @return BudgetSummary
     */
    public function reportBudgetSummary()
    {
        return new BudgetSummary($this->config);
    }

    /**
     * @return ExecutiveSummary
     */
    public function reportExecutiveSummary()
    {
        return new ExecutiveSummary($this->config);
    }

    /**
     * @return GSTReport
     */
    public function reportGSTReport()
    {
        return new GSTReport($this->config);
    }

    /**
     * @return ProfitAndLoss
     */
    public function reportProfitAndLoss()
    {
        return new ProfitAndLoss($this->config);
    }

    /**
     * @return TrialBalance
     */
    public function reportTrialBalance()
    {
        return new TrialBalance($this->config);
    }
}