<?php

require_once(__DIR__.'/../sdk/EasyTransac/autoload.php');

use EasyTransac\Core\Services;
use EasyTransac\Entities\DebitTransaction;
use EasyTransac\Entities\Customer;
use EasyTransac\Requests\DebitPayment;

Services::getInstance()->setDebug(true);
Services::getInstance()->provideAPIKey('a1b2c3d4');

$customer = (new Customer())
    ->setFirstname('Demo')
    ->setLastname('Mini SDK')
    ->setCity('Strasbourg')
    ->setUid('a1b2c3d4');

$transaction = (new DebitTransaction())
    ->setAmount(100)
    ->setClientIp('127.0.0.1')
    ->setCustomer($customer)
    ->setBic('abc')
    ->setIban('abcde');

$dp = new DebitPayment();
$response = $dp->execute($transaction);

if ($response->isSuccess())
{
    var_dump($response->getContent()->toArray());
}
else
{
    var_dump($response->getErrorMessage());
}

?>