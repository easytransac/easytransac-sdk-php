<?php

require_once(__DIR__.'/../sdk/EasyTransac/autoload.php');

use EasyTransac\Core\Services;
use EasyTransac\Entities\PaymentCapture;
use EasyTransac\Requests;

Services::getInstance()->setDebug(true);
Services::getInstance()->provideAPIKey('a1b2c3d4');

$paymentCapture = (new PaymentCapture())
	->setTid('a1b2c3d4')
	->setLanguage('FRE');

$request = new Requests\Capture();
$response = $request->execute($paymentCapture);

if ($response->isSuccess())
{
	var_dump($response->getContent()->toArray());
}
else
{
	var_dump($response->getErrorMessage());
}

?>