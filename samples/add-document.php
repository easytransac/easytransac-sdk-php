<?php

require_once(__DIR__.'/../sdk/EasyTransac/autoload.php');

use EasyTransac\Core\Services;
use EasyTransac\Entities\User;
use EasyTransac\Entities\Document;
use EasyTransac\Entities\DocumentRequest;
use EasyTransac\Requests\AddDocument;

Services::getInstance()->setDebug(true);
Services::getInstance()->provideAPIKey('a1b2c3d4');

$file = __DIR__.'/drivers-license.jpg';

$user = (new User())
	->setId(1589632);

$document = (new Document)
	->setDocumentType('IDENTITY_PROOF')
	->setContent(base64_encode(file_get_contents($file)))
	->setExtension(pathinfo($file, PATHINFO_EXTENSION));	
	
$args = (new DocumentRequest())
	->setUser($user)
	->setDocument($document);	
	
$request = new AddDocument();
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