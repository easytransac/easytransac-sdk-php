EasyTransac SDK (PHP)
=====================

[![Build](https://github.com/easytransac/easytransac-sdk-php/actions/workflows/build.yml/badge.svg)](https://github.com/easytransac/easytransac-sdk-php/actions/workflows/build.yml)
[![PSR12](https://github.com/easytransac/easytransac-sdk-php/actions/workflows/psr12.yml/badge.svg)](https://github.com/easytransac/easytransac-sdk-php/actions/workflows/psr12.yml)
[![Test](https://github.com/easytransac/easytransac-sdk-php/actions/workflows/test.yml/badge.svg)](https://github.com/easytransac/easytransac-sdk-php/actions/workflows/test.yml)
[![Coverage Status](https://coveralls.io/repos/github/easytransac/easytransac-sdk-php/badge.svg?branch=master)](https://coveralls.io/github/easytransac/easytransac-sdk-php?branch=master)

[![Latest Stable Version](https://poser.pugx.org/easytransac/easytransac-sdk-php/version)](https://packagist.org/packages/easytransac/easytransac-sdk-php)
[![Latest Unstable Version](http://poser.pugx.org/easytransac/easytransac-sdk-php/v/unstable)](https://packagist.org/packages/easytransac/easytransac-sdk-php)

Make your EasyTransac API implementation easier with our SDK.

The EasyTransac SDK is a tool to process payments with the [EasyTransac API](https://www.easytransac.com/).

Currently, it processes credit cards and SEPA Direct Debit (SDD), and allows to manage sub-merchants.

Requirements
------------

You need at least:
  - Based on the SDK version:
    - 1.3+ versions requires PHP >= 7.4
    - Older versions requires PHP >=5.5
  - cURL in order to get clear error messages
  - An API key provided by EasyTransac (register an account at [EasyTransac website](https://www.easytransac.com/))
  - OpenSSL version 1.0.1 to support TLSv1.2 ciphers

Installation
------------

### By composer

Execute this command on your terminal in the project folder:

    composer require easytransac/easytransac-sdk-php

Or add this in your *composer.json*:

    "require": {
      ...
      "easytransac/easytransac-sdk-php": "*",
    }

### Manually

In order to use it, you only need to require the autoload file *easytransac/easytransac-sdk-php/sdk/EasyTransac/autoload.php*.

Unit Testing
------------

Our test cases are written under PHPUnit 4.4.1, also if you want to launch tests, please check your PHPUnit version for methods compatibility.

Samples
-------

Samples are provided with the SDK.

### Set up the configuration
```php
// Don't forget to require the composer autoload or sdk's
require_once(__DIR__.'/vendor/easytransac/easytransac-sdk-php/sdk/EasyTransac/autoload.php');

// Provide the API key
EasyTransac\Core\Services::getInstance()->provideAPIKey('YOUR_API_KEY_HERE');

// For testing, you can activate logs
EasyTransac\Core\Services::getInstance()->setDebug(true);

// Connexion timeout in second
EasyTransac\Core\Services::getInstance()->setRequestTimeout(30);

// You can change the log directory (by default the path is the running script path)
Logger::getInstance()->setFilePath('YOU_CUSTOM_PATH');
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
    ->setYear('2017')
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

	// Check if the 3DSecure is forced by the server on this transaction,
	// if yes, then we must use the 3DS url to finish the transaction
	if ($transactionItem->getSecure())
	{
	    // Using of the 3DS url
	    // You have to call this url to proceed the 3DS process
	    // $transactionItem->getSecureUrl();

	}
	else
	{
	    // Shows the transaction status and id      
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
// EasyTransac notifies you for the payment status
// Then in your website, you have to create a script to receive the notification
$response = \EasyTransac\Core\PaymentNotification::getContent($_POST, $myApiKey);

// Response of type \EasyTransac\Entities\Notification
var_dump($response->toArray());

// Payment status
var_dump($response->getStatus());

// If you have a doubt about a value that does not exist in the response, 
// you can print the superglobal $_POST, all notification values are there:
var_dump($_POST);
```

### Get base API response in JSON and Array
```php
// You can get the complete response from the api with these methods bellow
$dp = new EasyTransac\Requests\DirectPayment();
$response = $dp->execute($transaction);

var_dump($response->getRealJsonResponse()); // Jsonified response (stdClass object)
var_dump($response->getRealArrayResponse()); // Array item

```
