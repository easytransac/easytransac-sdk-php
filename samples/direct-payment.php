<?php

require_once(__DIR__.'/../sdk/EasyTransac/autoload.php');

use EasyTransac\Core\Services;
use EasyTransac\Entities\DirectTransaction;
use EasyTransac\Entities\Customer;
use EasyTransac\Entities\CreditCard;
use EasyTransac\Requests\DirectPayment;

Services::getInstance()->setDebug(true);
Services::getInstance()->provideAPIKey('a1b2c3d4');

$customer = (new Customer())
    ->setFirstname('Demo')
    ->setLastname('Mini SDK')
    ->setCity('Strasbourg')
    ->setUid('a1b2c3d4');

$card = (new CreditCard())
    ->setNumber('4539527688361959')
    ->setMonth('10')
    ->setYear('2017')
    ->setCVV('123');

$transaction = (new DirectTransaction())
    ->setAmount(100)
    ->setClientIp('127.0.0.1')
    ->setCustomer($customer)
    ->setCreditCard($card);

$dp = new DirectPayment();
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