<?php

/**
 * Example Private Application
 */

use Xero\XeroApplication;
use Xero\accounting\Invoices;


$auth = [
    "consumer_key" => '',
    "consumer_secret" => '',
    "private_key_file" => '',
];

$xero = new \Xero\XeroApplication($auth);

$invoices = $xero->invoices();