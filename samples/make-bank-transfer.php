<?php

require_once(__DIR__.'/../sdk/EasyTransac/autoload.php');

use EasyTransac\Core\Services;
use EasyTransac\Entities\Customer;
use EasyTransac\Entities\InitBankTransfer;
use EasyTransac\Requests\MakeBankTransfer;

Services::getInstance()->setDebug(true);
Services::getInstance()->provideAPIKey('a1b2c3d4');

$customer = (new Customer())
	->setClientId('a4f7g53');

$initBankTransfer = (new InitBankTransfer())
	->setCustomer($customer)
	->setAmount(1234)
	->setReference('BONUS');
	
$request = new MakeBankTransfer();
$response = $request->execute($initBankTransfer);

if ($response->isSuccess())
{
	var_dump($response->getContent()->toArray());
}
else
{
	var_dump($response->getErrorMessage());
}

?>