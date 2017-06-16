<?php

use Xero\Invoices;

function getInvoices(){

    $authentication = [
        "consumer_key" => '',
        "consumer_secret" => '',
        "private_key_passphrase" => '',
    ];

    $invoices = new Invoices($authentication);

    return $invoices->get();
}

?>