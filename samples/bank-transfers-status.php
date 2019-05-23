<?php

require_once(__DIR__.'/../sdk/EasyTransac/autoload.php');

use EasyTransac\Core\Services;
use EasyTransac\Entities;
use EasyTransac\Requests;

Services::getInstance()->setDebug(true);
Services::getInstance()->provideAPIKey('a1b2c3d4');

$customer = (new Entities\Customer())
	->setClientId('a4f7g53');

$arg = (new Entities\BankTransferStatus())
	->setCustomer($customer)
	->setPayoutId('abc123');

$request = new Requests\BankTransferStatus();
$response = $request->execute($arg);

if ($response->isSuccess())
{
	var_dump($response->getContent()->toArray());
}
else
{
	var_dump($response->getErrorMessage());
}

?>