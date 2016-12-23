<?php

require_once(__DIR__.'/../sdk/EasyTransac/autoload.php');

use EasyTransac\Core\Services;
use EasyTransac\Entities\PaymentPageTransaction;
use EasyTransac\Requests\PaymentPage;
use EasyTransac\Entities\Customer;

Services::getInstance()->setDebug(true);
Services::getInstance()->provideAPIKey('a1b2c3d4');

$customer = (new Customer())
    ->setEmail('test@test.com');

$transaction = (new PaymentPageTransaction())
    ->setAmount(1234)
    ->setClientIP('127.0.0.1')
    ->setCustomer($customer)
    ->setReturnUrl('https://www.easytransac.com');

$request = new PaymentPage();
$response = $request->execute($transaction);

if ($response->isSuccess())
{
    var_dump($response->getContent()->toArray());
}
else
{
    var_dump($response->getErrorMessage());
}

?>