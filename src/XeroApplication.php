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
use Xero\accounting\TaxRatesFilter;
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
        'user_agent' => '' //name of application
    ];

    private $accounts;
    private $bankTransactions;
    private $bankTransfers;
    private $brandingThemes;
    private $contactGroups;
    private $contacts;
    private $creditNotes;
    private $currencies;
    private $employees;
    private $expenseClaims;
    private $invoiceReminders;
    private $invoices;
    private $items;
    private $journals;
    private $linkedTransactions;
    private $manualJournals;
    private $organisation;
    private $overPayments;
    private $payments;
    private $prePayments;
    private $purchaseOrders;
    private $receipts;
    private $repeatingInvoices;
    private $taxRates;
    private $trackingCategories;
    private $users;
    private $reportAgedPayablesByContact;
    private $reportAgedReceivableByContact;
    private $reportBalanceSheet;
    private $reportBankStatement;
    private $reportBankSummary;
    private $reportBASReport;
    private $reportBudgetSummary;
    private $reportExecutiveSummary;
    private $reportGSTReport;
    private $reportProfitAndLoss;
    private $reportTrialBalance;

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

    public function accounts()
    {
        if (!is_a($this->accounts, 'Accounts')) {
            $this->accounts = new Accounts($this->config);
        }
        return $this->accounts;
    }

    public function bankTransactions()
    {
        if (!is_a($this->bankTransactions, 'BankTransactions')) {
            $this->bankTransactions = new BankTransactions($this->config);
        }
        return $this->bankTransactions;
    }

    public function bankTransfers()
    {
        if (!is_a($this->bankTransfers, 'BankTransfers')) {
            $this->bankTransfers = new BankTransfers($this->config);
        }
        return $this->bankTransfers;
    }

    public function brandingThemes()
    {
        if (!is_a($this->brandingThemes, 'BrandingTheme')) {
            $this->brandingThemes = new BrandingThemes($this->config);
        }
        return $this->brandingThemes;
    }

    public function contactGroups()
    {
        if (!is_a($this->contactGroups, 'ContactGroups')) {
            $this->contactGroups = new ContactGroups($this->config);
        }
        return $this->contactGroups;
    }

    public function contacts()
    {
        if (!is_a($this->contacts, 'Contacts')) {
            $this->invoices = new Contacts($this->config);
        }
        return $this->contacts;
    }

    public function creditNotes()
    {
        if (!is_a($this->creditNotes, 'CreditNotes')) {
            $this->creditNotes = new CreditNotes($this->config);
        }
        return $this->creditNotes;
    }

    public function currencies()
    {
        if (!is_a($this->currencies, 'Currencies')) {
            $this->currencies = new Currencies($this->config);
        }
        return $this->currencies;
    }

    public function employees()
    {
        if (!is_a($this->employees, 'Employees')) {
            $this->employees = new Employees($this->config);
        }
        return $this->employees;
    }

    public function expenseClaims()
    {
        if (!is_a($this->expenseClaims, 'ExpenseClaims')) {
            $this->expenseClaims = new ExpenseClaims($this->config);
        }
        return $this->expenseClaims;
    }

    public function invoiceReminders()
    {
        if (!is_a($this->invoiceReminders, 'InvoiceReminders')) {
            $this->invoiceReminders = new InvoiceReminders($this->config);
        }
        return $this->invoiceReminders;
    }

    public function invoices()
    {
        if (!is_a($this->invoices, 'Invoices')) {
            $this->invoices = new Invoices($this->config);
        }
        return $this->invoices;
    }

    public function items()
    {
        if (!is_a($this->items, 'Items')) {
            $this->items = new Items($this->config);
        }
        return $this->items;
    }

    public function journals()
    {
        if (!is_a($this->journals, 'Journals')) {
            $this->journals = new Journals($this->config);
        }
        return $this->journals;
    }

    public function linkedTransactions()
    {
        if (!is_a($this->linkedTransactions, 'LinkedTransactions')) {
            $this->linkedTransactions = new LinkedTransactions($this->config);
        }
        return $this->linkedTransactions;
    }

    public function manualJournals()
    {
        if (!is_a($this->manualJournals, 'ManualJournals')) {
            $this->manualJournals = new ManualJournals($this->config);
        }
        return $this->manualJournals;
    }

    public function organisation()
    {
        if (!is_a($this->organisation, 'Organisation')) {
            $this->organisation = new Organisation($this->config);
        }
        return $this->organisation;
    }

    public function overPayments()
    {
        if (!is_a($this->overPayments, 'OverPayments')) {
            $this->overPayments = new OverPayments($this->config);
        }
        return $this->overPayments;
    }

    public function payments()
    {
        if (!is_a($this->payments, 'Payments')) {
            $this->payments = new Payments($this->config);
        }
        return $this->payments;
    }

    public function prePayments()
    {
        if (!is_a($this->prePayments, 'PrePayments')) {
            $this->prePayments = new PrePayments($this->config);
        }
        return $this->prePayments;
    }

    public function purchaseOrders()
    {
        if (!is_a($this->purchaseOrders, 'PurchaseOrders')) {
            $this->purchaseOrders = new PurchaseOrders($this->config);
        }
        return $this->purchaseOrders;
    }

    public function receipts()
    {
        if (!is_a($this->receipts, 'Receipts')) {
            $this->receipts = new Receipts($this->config);
        }
        return $this->receipts;
    }

    public function repeatingInvoices()
    {
        if (!is_a($this->repeatingInvoices, 'RepeatingInvoices')) {
            $this->repeatingInvoices = new RepeatingInvoices($this->config);
        }
        return $this->repeatingInvoices;
    }

    public function taxRates()
    {
        if (!is_a($this->taxRates, 'TaxRates')) {
            $this->taxRates = new TaxRatesFilter($this->config);
        }
        return $this->taxRates;
    }

    public function trackingCategories()
    {
        if (!is_a($this->trackingCategories, 'TrackingCategories')) {
            $this->trackingCategories = new TrackingCategories($this->config);
        }
        return $this->trackingCategories;
    }

    public function users()
    {
        if (!is_a($this->users, 'Users')) {
            $this->users = new Users($this->config);
        }
        return $this->users;
    }

    public function reportAgedPayableByContact()
    {
        if (!is_a($this->reportAgedPayablesByContact, 'AgedPayablesByContact')) {
            $this->reportAgedPayablesByContact = new AgedPayablesByContact($this->config);
        }
        return $this->reportAgedPayablesByContact;
    }

    public function reportAgedReceivableByContact()
    {
        if(!is_a($this->reportAgedReceivableByContact, 'AgedReceivablesByContact')){
            $this->reportAgedReceivableByContact = new AgedReceivablesByContact($this->config);
        }
        return $this->reportAgedReceivableByContact;
    }

    public function reportBalanceSheet()
    {
        if(!is_a($this->reportBalanceSheet, 'BalanceSheet')){
            $this->reportBalanceSheet = new BalanceSheet($this->config);
        }
        return $this->reportBalanceSheet;
    }
    
    public function reportBankStatement()
    {
        if(!is_a($this->reportBankStatement, 'BankStatement')){
            $this->reportBankStatement = new BankStatement($this->config);
        }
        return $this->reportBankStatement;
    }
    
    public function reportBankSummary()
    {
        if(!is_a($this->reportBankSummary, 'BankSummary')){
            $this->reportBankSummary = new BankSummary($this->config);
        }
        return $this->reportBankSummary;
    }

    public function reportBASReport()
    {
        if(!is_a($this->reportBASReport, 'BASReport')){
            $this->reportBASReport = new BASReport($this->config);
        }
        return $this->reportBASReport;
    }

    public function reportBudgetSummary()
    {
        if(!is_a($this->reportBudgetSummary, 'BudgetSummary')){
            $this->reportBudgetSummary = new BudgetSummary($this->config);
        }
        return $this->reportBudgetSummary;
    }

    public function reportExecutiveSummary()
    {
        if(!is_a($this->reportExecutiveSummary, 'ExecutiveSummary')){
            $this->reportExecutiveSummary = new ExecutiveSummary($this->config);
        }
        return $this->reportExecutiveSummary;
    }

    public function reportGSTReport()
    {
        if(!is_a($this->reportGSTReport, 'GSTReport')){
            $this->reportGSTReport = new GSTReport($this->config);
        }
        return $this->reportGSTReport;
    }

    public function reportProfitAndLoss()
    {
        if(!is_a($this->reportProfitAndLoss, 'ProfitAndLoss')){
            $this->reportProfitAndLoss = new ProfitAndLoss($this->config);
        }
        return $this->reportProfitAndLoss;
    }

    public function reportTrialBalance()
    {
        if(!is_a($this->reportTrialBalance, 'TrialBalance')){
            $this->reportTrialBalance = new TrialBalance($this->config);
        }
        return $this->reportTrialBalance;
    }
}