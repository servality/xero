<?php

/**
 * Example Private Application
 */

use Xero\XeroApplication;

$config = [
    'oauth' => [
        'consumer_key' => '',
        'consumer_secret' => '',
        'private_key_file' => '',
    ],
    'response' => '',
    'user_agent' => ''
];

$xero = new XeroApplication($config);

$xero->invoices()->get();