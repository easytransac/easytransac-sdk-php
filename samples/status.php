<?php

require_once(dirname(__FILE__).'/../lib/EasyTransac/autoload.php');

use \EasyTransac\Core\Services;
use \EasyTransac\Entities\PaymentStatus;
use \EasyTransac\Requests\PaymentStatus;

Services::getInstance()->setDebug(true);
Services::getInstance()->provideAPIKey('a1b2c3d4');

$transaction = new PaymentStatus();
$transaction->setTid('a1b2c3d4');

$request = new PaymentStatus();
$response = $request->execute($transaction);

if ($response->isSuccess())
{
    var_dump($response->getContent()->toArray());
}
else
{
    var_dump($response->getErrorMessage());
}

?>