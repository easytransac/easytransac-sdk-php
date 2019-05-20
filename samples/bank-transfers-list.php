<?php

require_once(__DIR__.'/../sdk/EasyTransac/autoload.php');

use EasyTransac\Core\Services;
use EasyTransac\Entities\Customer;
use EasyTransac\Requests\BankTransfersList;

Services::getInstance()->setDebug(true);
Services::getInstance()->provideAPIKey('a1b2c3d4');

$customer = (new Customer())
	->setClientId('a4f7g53');

$request = new BankTransfersList();
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