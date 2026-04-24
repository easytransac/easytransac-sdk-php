<?php

use PHPUnit\Framework\TestCase;

class DropinSessionTransactionTest extends TestCase
{
    public function testToArray()
    {
        $fixture = $this->getFixture();

        $customer = new EasyTransac\Entities\Customer();
        $customer->setEmail($fixture['Customer']['Email']);
        $customer->setFirstname($fixture['Customer']['Firstname']);
        $customer->setLastname($fixture['Customer']['Lastname']);

        $transaction = new EasyTransac\Entities\DropinSessionTransaction();
        $transaction->setAmount($fixture['Amount']);
        $transaction->setCancelUrl($fixture['CancelUrl']);
        $transaction->setClientIP($fixture['ClientIP']);
        $transaction->setCustomer($customer);
        $transaction->setDescription($fixture['Description']);
        $transaction->setLanguage($fixture['Language']);
        $transaction->setNotificationUrl($fixture['NotificationUrl']);
        $transaction->setOrderId($fixture['OrderId']);
        $transaction->setReturnUrl($fixture['ReturnUrl']);

        $this->assertEquals($this->getFixture(true), $transaction->toArray());
        $this->assertEquals($fixture['NotificationUrl'], $transaction->getNotificationUrl());
    }

    public function testHydrate()
    {
        $transaction = new EasyTransac\Entities\DropinSessionTransaction();
        $transaction->hydrate(json_decode(json_encode($this->getFixture())));

        $this->assertEquals($this->getFixture(true), $transaction->toArray());
        $this->assertEquals($this->getFixture()['NotificationUrl'], $transaction->getNotificationUrl());
    }

    protected function getFixture($rendered = false)
    {
        if (!$rendered) {
            return [
                'OrderId' => 'ORDER-123',
                'Amount' => 1000,
                'ClientIP' => '127.0.0.1',
                'Description' => 'Drop-in test order',
                'ReturnUrl' => 'https://merchant.test/return',
                'CancelUrl' => 'https://merchant.test/cancel',
                'NotificationUrl' => 'https://merchant.test/notify',
                'Language' => 'FRE',
                'Customer' => [
                    'Email' => 'john.doe@example.com',
                    'Firstname' => 'John',
                    'Lastname' => 'Doe',
                ],
            ];
        }

        return [
            'OrderId' => 'ORDER-123',
            'Amount' => 1000,
            'ClientIP' => '127.0.0.1',
            'Description' => 'Drop-in test order',
            'ReturnUrl' => 'https://merchant.test/return',
            'CancelUrl' => 'https://merchant.test/cancel',
            'NotificationUrl' => 'https://merchant.test/notify',
            'Email' => 'john.doe@example.com',
            'Firstname' => 'John',
            'Lastname' => 'Doe',
            'Language' => 'FRE',
        ];
    }

     public function testSetProvidersWithString()
    {
        $entity = new EasyTransac\Entities\DropinSessionTransaction();

        $entity->setProviders('card');

        $this->assertEquals('card', $entity->getProviders());
        $this->assertEquals('card', $entity->toArray()['Providers']);
    }

    public function testSetProvidersCleansString()
    {
        $entity = new EasyTransac\Entities\DropinSessionTransaction();

        $entity->setProviders(' ApplePay,GooglePay ');

        $this->assertEquals('applepay,googlepay', $entity->getProviders());
        $this->assertEquals('applepay,googlepay', $entity->toArray()['Providers']);
    }

    public function testSetProvidersWithArray()
    {
        $entity = new EasyTransac\Entities\DropinSessionTransaction();

        $entity->setProviders(['applepay', 'googlepay']);

        $this->assertEquals('applepay,googlepay', $entity->getProviders());
        $this->assertEquals('applepay,googlepay', $entity->toArray()['Providers']);
    }

    public function testSetProvidersCleansArray()
    {
        $entity = new EasyTransac\Entities\DropinSessionTransaction();

        $entity->setProviders([' applepay ', 'googlepay', 'applepay', '', ' GooglePay ']);

        $this->assertEquals('applepay,googlepay', $entity->getProviders());
        $this->assertEquals('applepay,googlepay', $entity->toArray()['Providers']);
    }

    public function testSetProvidersDoesNotForceCard()
    {
        $entity = new EasyTransac\Entities\DropinSessionTransaction();

        $entity->setProviders(['applepay', 'googlepay']);

        $this->assertEquals('applepay,googlepay', $entity->getProviders());
        $this->assertStringNotContainsString('card', $entity->toArray()['Providers']);
    }
}
