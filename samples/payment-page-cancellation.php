<?php

require_once(__DIR__.'/../sdk/EasyTransac/autoload.php');

use EasyTransac\Core\Services;
use EasyTransac\Entities;
use EasyTransac\Requests;

Services::getInstance()->setDebug(true);
Services::getInstance()->provideAPIKey('a1b2c3d4');

$customer = (new Entities\Cancellation())
    ->setRequestId('a1b2c3d4')
    ->setLanguage('FRE');

$request = new Requests\PaymentPageCancellation();
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