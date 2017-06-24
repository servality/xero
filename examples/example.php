<?php

/**
 * Example Private Application
 */

use Xero\XeroApplication;

$auth = [
    "consumer_key" => '',
    "consumer_secret" => '',
    "private_key_file" => '',
];

$xero = new XeroApplication($auth);

$invoices = $xero->invoices()->get();

?>

<html>
    <head>
    </head>
    <body>
        <sapn><?php var_dump($invoices); ?></sapn>
    </body>
</html>