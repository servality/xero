PHP Wrapper for Xero API
------------------------

[![Latest Stable Version](https://poser.pugx.org/servality/xero/v/stable)](https://packagist.org/packages/servality/xero)
[![License](https://poser.pugx.org/servality/xero/license)](https://packagist.org/packages/servality/xero)

## Requirements
- PHP 7+
- guzzlehttp/guzzle
- guzzlehttp/oauth-subscriber

## Introduction

This application was written as a simple Xero API wrapper for use in a laravel application. At this stage, support is only available for __private__ applications. 

## Installation

Recommended installation through Composer.  

Bash:

```bash
composer require servality/xero
```
or add to composer.json:
```json
  "require": {
    "servality/xero": "dev-master"
  }
```
## Prerequisites


## Usage

### Basic usage
```php
   $config = [
       'authentication' => [
           'consumer_key' => 'appication_consumer_key',
           'consumer_secret' => 'appication_consumer_secret',
           'private_key_file' => 'path/to/private_key.pem',
           'private_key_passphrase' => 'passphrase'
       ],
       'response' => 'json', //json or xml
       'user_agent' => 'application_name'
   ]
   
   $xero = new XeroApplication($config);
   
   $xero->invoices()->get();
```
### Filtering
```php
   $xero->contacts()->where('name.contains("Mark")')->get();
```

## License

Open-sourced software licensed under the MIT license.