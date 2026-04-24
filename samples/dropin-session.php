<?php

require_once __DIR__ . '/../sdk/EasyTransac/autoload.php';
require_once __DIR__ . '/../bootstrap.php';

use EasyTransac\Core\Services;
use EasyTransac\Entities\Customer;
use EasyTransac\Entities\DropinSessionTransaction;
use EasyTransac\Requests\DropinSession;

Services::getInstance()->setDebug(true);
Services::getInstance()->provideAPIKey('a1b2c3d4');
Services::getInstance()->setEnvironment(Services::ENV_SANDBOX);

$customer = (new Customer())
    ->setEmail('john.doe@example.com')
    ->setFirstname('John')
    ->setLastname('Doe');

$transaction = (new DropinSessionTransaction())
    ->setOrderId('ORDER-123')
    ->setAmount(1000)
    ->setClientIP('127.0.0.1')
    ->setDescription('Drop-in test order')
    ->setLanguage('FRE')
    ->setReturnUrl('https://merchant.test/return')
    ->setCancelUrl('https://merchant.test/cancel')
    ->setNotificationUrl('https://merchant.test/notify')
    ->setCustomer($customer);

$request = new DropinSession();
$response = $request->execute($transaction);

if ($response->isSuccess()) {
    $session = $response->getContent();

    var_dump([
        'token' => $session->getToken(),
        'request_id' => $session->getRequestId(),
        'status' => $session->getStatus(),
    ]);
} else {
    var_dump($response->getErrorCode());
    var_dump($response->getErrorMessage());
    var_dump($response->getRealArrayResponse());
}
