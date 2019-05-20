<?php

require_once(__DIR__.'/../sdk/EasyTransac/autoload.php');

use EasyTransac\Core\Services;
use EasyTransac\Entities\User;
use EasyTransac\Entities\DocumentRequest;
use EasyTransac\Requests\FindDocument;

Services::getInstance()->setDebug(true);
Services::getInstance()->provideAPIKey('a1b2c3d4');

$user = (new User())
	->setId(1589632);

$args = (new DocumentRequest())
	->setUser($user);	
	
$request = new FindDocument();
$response = $request->execute($args);

if ($response->isSuccess())
{
    var_dump($response->getContent()->toArray());
}
else
{
    var_dump($response->getErrorMessage());
}

?>