<?php

require_once(__DIR__.'/../sdk/EasyTransac/autoload.php');

use EasyTransac\Core\Services;
use EasyTransac\Entities\OneClickTransaction;
use EasyTransac\Requests\OneClickPayment;

Services::getInstance()->setDebug(true);
Services::getInstance()->provideAPIKey('a1b2c3d4');

$transaction = (new OneClickTransaction())
    ->setAmount(100)
    ->setUid('a1b2c3d4')
    ->setClientIp('127.0.0.1')
    ->setAlias('mycardalias');

$dp = new OneClickPayment();
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