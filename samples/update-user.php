<?php

require_once(__DIR__.'/../sdk/EasyTransac/autoload.php');

use EasyTransac\Core\Services;
use EasyTransac\Entities\User;
use EasyTransac\Requests\UpdateUser;

Services::getInstance()->setDebug(true);
Services::getInstance()->provideAPIKey('a1b2c3d4');

$user = (new User())
    ->setId('a1b2c3d4')
    ->setEmail('test@test.com')
    ->setFirstname('test firstname')
    ->setLastname('test lastname');

$request = new UpdateUser();
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