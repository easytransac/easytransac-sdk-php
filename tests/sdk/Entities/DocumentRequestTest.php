<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class DocumentRequestTest extends PHPUnit_Framework_TestCase
{
    public function testSettersGetters()
    {
    	$fixture = $this->getFixture();

        $document = new \EasyTransac\Entities\Document();
        $document->setExtension($fixture['Extension']);

        $customer = new \EasyTransac\Entities\Customer();
        $customer->setClientId($fixture['ClientId']);

        $user = new \EasyTransac\Entities\User();
        $user->setEmail($fixture['Email']);

    	$c = new \EasyTransac\Entities\DocumentRequest();
        $c->setShowContent($fixture['ShowContent']);
        $c->setDocumentId($fixture['DocumentId']);
        $c->setDocument($document);
        $c->setCustomer($customer);
        $c->setUser($user);

    	$this->assertEquals($c->toArray(), $fixture);
    }

    protected function getFixture()
    {
    	return [
    		'Email' => 'john@doe.com',
    		'DocumentId' => '123',
    		'ShowContent' => 'yes',
    		'Extension' => 'png',
    		'ClientId' => '1234'
    	];
    }
}

?>
