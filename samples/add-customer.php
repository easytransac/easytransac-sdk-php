<?php

require_once(__DIR__.'/../sdk/EasyTransac/autoload.php');

use EasyTransac\Core\Services;
use EasyTransac\Entities\Customer;
use EasyTransac\Requests\AddCustomer;

Services::getInstance()->setDebug(true);
Services::getInstance()->provideAPIKey('a1b2c3d4');

$customer = (new Customer())
    ->setEmail('test@test.com')
    ->setFirstname('test firstname')
    ->setLastname('test lastname');

$request = new AddCustomer();
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