# EasyTransac SDK (PHP)


[![Build](https://github.com/easytransac/easytransac-sdk-php/actions/workflows/build.yml/badge.svg)](https://github.com/easytransac/easytransac-sdk-php/actions/workflows/build.yml)
[![PSR12](https://github.com/easytransac/easytransac-sdk-php/actions/workflows/psr12.yml/badge.svg)](https://github.com/easytransac/easytransac-sdk-php/actions/workflows/psr12.yml)
[![Test](https://github.com/easytransac/easytransac-sdk-php/actions/workflows/test.yml/badge.svg)](https://github.com/easytransac/easytransac-sdk-php/actions/workflows/test.yml)
[![Coverage Status](https://github.com/easytransac/easytransac-sdk-php/blob/code_quality/coverage_badge.svg?branch=code_quality)](https://github.com/easytransac/easytransac-sdk-php/actions/workflows/coverage-badge.yml)
[![Latest Stable Version](https://poser.pugx.org/easytransac/easytransac-sdk-php/version)](https://packagist.org/packages/easytransac/easytransac-sdk-php)

Make your EasyTransac API implementation easier with our SDK.

The EasyTransac SDK is a tool to process payments with the [EasyTransac API](https://www.easytransac.com/).

## What's New (v2.1.1)

- ✅ Updated SEPA Direct Debit (SDD) endpoint  
  - `api/payment/debit` → `api/payment/sdd/init`
- ✅ Fixed card listing endpoint  
  - `api/payment/listcards` → `api/payment/card/list`
- 🧾 Documentation updated accordingly
- ⚠️ No breaking changes in the SDK public API

## What's New (v2.1.0)

- ✅ Added `setEnvironment('sandbox')` for clean sandbox/production separation
- ✅ Full PHP **7.0 to 8.4** compatibility
- ✅ Deprecated PHP 5.6 support
- ✅ Improved response helpers and strict typing
- ✅ Updated documentation

## Requirements

You need at least:
- PHP ≥ 7.0
- cURL in order to get clear error messages
- An API key provided by EasyTransac (register an account at [EasyTransac website](https://www.easytransac.com/))
- OpenSSL version 1.0.1 to support TLSv1.2 ciphers

## Installation

### By composer

```bash
composer require easytransac/easytransac-sdk-php
```

Or add this in your *composer.json*:

```json
"require": {
  "easytransac/easytransac-sdk-php": "*"
}
```

### Manually

In order to use it, you only need to require the autoload file *easytransac/easytransac-sdk-php/sdk/EasyTransac/autoload.php*.

## Unit Testing

Our test cases are written under PHPUnit. Please check the required PHPUnit version in the `composer.json` file.

## Sandbox Support

As of v2.0.0, the sandbox API is hosted separately at:

```
https://sandbox.easytransac.com
```

Use the new method to enable sandbox mode:

```php
\EasyTransac\Core\Services::getInstance()->setEnvironment('sandbox');
```

No need to override API URLs manually.

## Samples

### Set up the configuration

```php
require_once(__DIR__.'/vendor/easytransac/easytransac-sdk-php/sdk/EasyTransac/autoload.php');

\EasyTransac\Core\Services::getInstance()->provideAPIKey('YOUR_API_KEY_HERE');
\EasyTransac\Core\Services::getInstance()->setEnvironment('sandbox');
\EasyTransac\Core\Services::getInstance()->setDebug(true);
\EasyTransac\Core\Services::getInstance()->setRequestTimeout(30);

\EasyTransac\Logger::getInstance()->setFilePath('YOUR_CUSTOM_PATH');
```

### Make a direct payment request

```php
$customer = (new EasyTransac\Entities\Customer())
    ->setFirstname('Demo')
    ->setLastname('Mini SDK')
    ->setCity('Strasbourg')
    ->setUid('a1b2c3d4');

$card = (new EasyTransac\Entities\CreditCard())
    ->setNumber('1111111111111111')
    ->setMonth('10')
    ->setYear('2025')
    ->setCVV('123');

$transaction = (new EasyTransac\Entities\DirectTransaction())
    ->setAmount(100)
    ->setClientIp('127.0.0.1')
    ->setCustomer($customer)
    ->setCreditCard($card);

$dp = new EasyTransac\Requests\DirectPayment();
$response = $dp->execute($transaction);

if ($response->isSuccess())
{
    $transactionItem = $response->getContent();

    if ($transactionItem->getSecure())
    {
        // Use 3DS URL to complete the transaction
        echo $transactionItem->getSecureUrl();
    }
    else
    {
        var_dump($transactionItem->getStatus());
        var_dump($transactionItem->getTid());
    }
}
else
{
    var_dump($response->getErrorMessage());
}
```

### Push payment notification

```php
$response = \EasyTransac\Core\PaymentNotification::getContent($_POST, $myApiKey);

var_dump($response->toArray());
var_dump($response->getStatus());
var_dump($_POST); // raw dump for debug
```

### Get base API response in JSON and Array

```php
$dp = new EasyTransac\Requests\DirectPayment();
$response = $dp->execute($transaction);

var_dump($response->getRealJsonResponse()); // stdClass
var_dump($response->getRealArrayResponse()); // array
```

