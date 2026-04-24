<?php

require_once(__DIR__ . '/../sdk/EasyTransac/autoload.php');

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
    ->setProviders('card')
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
