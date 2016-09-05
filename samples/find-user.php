<?php

require_once(dirname(__FILE__).'/../lib/EasyTransac/autoload.php');

use \EasyTransac\Core\Services;
use \EasyTransac\Entities\FindUserBy;
use \EasyTransac\Requests\FindUser;

Services::getInstance()->setDebug(true);
Services::getInstance()->provideAPIKey('a1b2c3d4');

$user = (new FindUserBy())
    ->setEmail('test@test.com');

$request = new FindUser();
$response = $request->execute($user);

if ($response->isSuccess())
{
    var_dump($response->getContent()->toArray());
}
else
{
    var_dump($response->getErrorMessage());
}

?>