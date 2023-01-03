<?php

require_once __DIR__ . '/../sdk/EasyTransac/autoload.php';
require_once __DIR__ . '/../bootstrap.php';

use EasyTransac\Core\Services;
use EasyTransac\Entities\CreditCard;

Services::getInstance()->setDebug(true);
Services::getInstance()->provideAPIKey('a1b2c3d4');

$card = (new CreditCard())
    ->setNumber('4539527688361959');

$request = new EasyTransac\Requests\CreditCardInfo();
$response = $request->execute($card);
var_dump($response);

if ($response->isSuccess()) {
    var_dump($response->getContent()->toArray());
} else {
    var_dump($response->getErrorMessage());
}
