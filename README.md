# EasyTransac SDK (PHP)

[![Build](https://github.com/easytransac/easytransac-sdk-php/actions/workflows/build.yml/badge.svg)](https://github.com/easytransac/easytransac-sdk-php/actions/workflows/build.yml)
[![PSR12](https://github.com/easytransac/easytransac-sdk-php/actions/workflows/psr12.yml/badge.svg)](https://github.com/easytransac/easytransac-sdk-php/actions/workflows/psr12.yml)
[![Test](https://github.com/easytransac/easytransac-sdk-php/actions/workflows/test.yml/badge.svg)](https://github.com/easytransac/easytransac-sdk-php/actions/workflows/test.yml)
[![Coverage Status](https://github.com/easytransac/easytransac-sdk-php/blob/code_quality/coverage_badge.svg?branch=code_quality)](https://github.com/easytransac/easytransac-sdk-php/actions/workflows/coverage-badge.yml)
[![Latest Stable Version](https://poser.pugx.org/easytransac/easytransac-sdk-php/version)](https://packagist.org/packages/easytransac/easytransac-sdk-php)

Make your EasyTransac API implementation easier with our SDK.

The EasyTransac SDK is a tool to process payments with the [EasyTransac API](https://www.easytransac.com/).

## What's New (v2.2.2)

- Added `setEnvironment('sandbox')` for clean sandbox/production separation
- Full PHP `7.4` to `8.4` compatibility
- Deprecated PHP 5.6 support
- Improved response helpers and strict typing
- Added backend Drop-in session support
- Updated documentation

## Requirements

You need at least:

- PHP >= 7.4
- cURL in order to get clear error messages
- An API key provided by EasyTransac
- OpenSSL version 1.0.1 to support TLS v1.2 ciphers

## Installation

### By composer

```bash
composer require easytransac/easytransac-sdk-php
```

Or add this in your `composer.json`:

```json
{
  "require": {
    "easytransac/easytransac-sdk-php": "*"
  }
}
```

### Manually

In order to use it, you only need to require the autoload file `easytransac/easytransac-sdk-php/sdk/EasyTransac/autoload.php`.

## Unit Testing

Our test cases are written under PHPUnit. Please check the required PHPUnit version in the `composer.json` file.

## Sandbox Support

As of v2.0.0, the sandbox API is hosted separately at:

```text
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
require_once(__DIR__ . '/vendor/easytransac/easytransac-sdk-php/sdk/EasyTransac/autoload.php');

\EasyTransac\Core\Services::getInstance()->provideAPIKey('YOUR_API_KEY_HERE');
\EasyTransac\Core\Services::getInstance()->setEnvironment('sandbox');
\EasyTransac\Core\Services::getInstance()->setDebug(true);
\EasyTransac\Core\Services::getInstance()->setRequestTimeout(30);
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

$request = new EasyTransac\Requests\DirectPayment();
$response = $request->execute($transaction);

if ($response->isSuccess()) {
    $transactionItem = $response->getContent();

    if ($transactionItem->getSecure()) {
        echo $transactionItem->getSecureUrl();
    } else {
        var_dump($transactionItem->getStatus());
        var_dump($transactionItem->getTid());
    }
} else {
    var_dump($response->getErrorMessage());
}
```

### Push payment notification

```php
$response = \EasyTransac\Core\PaymentNotification::getContent($_POST, $myApiKey);

var_dump($response->toArray());
var_dump($response->getStatus());
var_dump($_POST);
```

### Get base API response in JSON and Array

```php
$request = new EasyTransac\Requests\DirectPayment();
$response = $request->execute($transaction);

var_dump($response->getRealJsonResponse());
var_dump($response->getRealArrayResponse());
```

### Create a Drop-in session token

The Drop-in flow starts on the backend with `POST /api/dropin/session`.

Important:

- `Providers` is required by the EasyTransac API
- pass it on the transaction with `->setProviders(...)`
- `setProviders()` accepts either a comma-separated string or an array
- array values are trimmed, lowercased, deduplicated, and serialized for the API
- examples: `card`, `applepay,googlepay,card`, or `['applepay', 'googlepay']`

```php
use EasyTransac\Core\Services;
use EasyTransac\Entities\Customer;
use EasyTransac\Entities\DropinSessionTransaction;
use EasyTransac\Requests\DropinSession;

Services::getInstance()
    ->provideAPIKey('your_api_key')
    ->setEnvironment(Services::ENV_SANDBOX);

$customer = (new Customer())
    ->setFirstname('John')
    ->setLastname('Doe')
    ->setEmail('john.doe@example.com');

$transaction = (new DropinSessionTransaction())
    ->setOrderId('ORDER-123')
    ->setAmount(1000)
    ->setDescription('Drop-in test order')
    ->setLanguage('FRE')
    ->setReturnUrl('https://merchant.test/return')
    ->setCancelUrl('https://merchant.test/cancel')
    ->setNotificationUrl('https://merchant.test/notify')
    ->setProviders(['applepay', 'googlepay'])
    ->setCustomer($customer);

$response = (new DropinSession())->execute($transaction);

if (!$response->isSuccess()) {
    var_dump($response->getErrorCode(), $response->getErrorMessage());
    exit(1);
}

$session = $response->getContent();
var_dump([
    'token' => $session->getToken(),
    'request_id' => $session->getRequestId(),
    'status' => $session->getStatus(),
]);
```

You can now pass the returned session token to the EasyTransac frontend Drop-in widget.
