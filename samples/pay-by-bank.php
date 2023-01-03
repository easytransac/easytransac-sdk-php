<?php

require_once __DIR__ . '/../sdk/EasyTransac/autoload.php';
require_once __DIR__ . '/../bootstrap.php';

use EasyTransac\Core\Services;
use EasyTransac\Entities\Customer;
use EasyTransac\Entities\PayByBank;
use EasyTransac\Requests;

Services::getInstance()->setDebug(true);
Services::getInstance()->provideAPIKey('a1b2c3d4');


$customer = (new Customer())
    ->setFirstname('Demo')
    ->setLastname('Mini SDK')
    ->setCity('Strasbourg')
    ->setUid('a1b2c3d4');

$entity = (new PayByBank())
    ->setAmount(100)
    ->setClientIp('127.0.0.1')
    ->setCustomer($customer);


$request = new Requests\PayByBank();
$response = $request->execute($entity);

if ($response->isSuccess()) {
    var_dump($response->getContent()->toArray());
} else {
    var_dump($response->getErrorMessage());
}
