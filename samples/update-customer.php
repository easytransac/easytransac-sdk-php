<?php

require_once(__DIR__.'/../sdk/EasyTransac/autoload.php');

use EasyTransac\Core\Services;
use EasyTransac\Entities\Customer;
use EasyTransac\Requests\UpdateCustomer;

Services::getInstance()->setDebug(true);
Services::getInstance()->provideAPIKey('a1b2c3d4');

$customer = (new Customer())
    ->setClientId('a9n4v8d')
    ->setAddress('26 green street')
    ->setZipCode('75001')
    ->setCity('Paris')
    ->setCountry('FRA');

$request = new UpdateCustomer();
$response = $request->execute($customer);

if ($response->isSuccess())
{
    var_dump($response->getContent()->toArray());
}
else
{
    var_dump($response->getErrorMessage());
}

?>