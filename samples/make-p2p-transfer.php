<?php

require_once(__DIR__.'/../sdk/EasyTransac/autoload.php');

use EasyTransac\Core\Services;
use EasyTransac\Entities\P2PTransfer;
use EasyTransac\Requests\MakeP2PTransfer;

Services::getInstance()->setDebug(true);
Services::getInstance()->provideAPIKey('a1b2c3d4');

$transfer = new P2PTransfer();
$transfer
	->setFrom('test@test.com')
	->setTo('test2@test.com')
	->setAmount(100)
	->setTid('abcd1234')
	->setDescription('transfer test');

$request = new MakeP2PTransfer();
$response = $request->execute($transfer);

if ($response->isSuccess())
{
	var_dump($response->getContent()->toArray());
}
else
{
	var_dump($response->getErrorMessage());
}

?>
