<?php

use EasyTransac\Entities\Customer;
use EasyTransac\Entities\Document;
use EasyTransac\Entities\DocumentRequest;
use EasyTransac\Entities\User;
use PHPUnit\Framework\TestCase;

class DocumentRequestTest extends TestCase
{
    public function testSettersGetters()
    {
        $fixture = $this->getFixture();

        $document = new Document();
        $document->setExtension($fixture['Extension']);

        $customer = new Customer();
        $customer->setClientId($fixture['ClientId']);

        $user = new User();
        $user->setEmail($fixture['Email']);

        $c = new DocumentRequest();
        $c->setShowContent($fixture['ShowContent']);
        $c->setDocumentId($fixture['DocumentId']);
        $c->setDocument($document);
        $c->setCustomer($customer);
        $c->setUser($user);

        $this->assertEquals($c->toArray(), $fixture);
    }

    protected function getFixture(): array
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
