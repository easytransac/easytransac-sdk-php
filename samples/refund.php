<?php

require_once(__DIR__.'/../sdk/EasyTransac/autoload.php');

use EasyTransac\Core\Services;
use EasyTransac\Entities\Refund;
use EasyTransac\Requests\PaymentRefund;

Services::getInstance()->setDebug(true);
Services::getInstance()->provideAPIKey('a1b2c3d4');

$refund = (new Refund())
    ->setTid('a1b2c3d4');

$request = new PaymentRefund();
$response = $request->execute($refund);

if ($response->isSuccess())
{
    var_dump($response->getContent()->toArray());
}
else
{
    var_dump($response->getErrorMessage());
}

?>