<?php

use EasyTransac\Entities\AddCreditCard;
use EasyTransac\Entities\CreditCard;
use EasyTransac\Entities\Customer;
use PHPUnit\Framework\TestCase;

class AddCreditCardTest extends TestCase
{
    public function testToArray()
    {
        $cust = (new Customer())->setEmail("test@test.com");
        $card = (new CreditCard())->setCVV("123");

        $c = new AddCreditCard();
        $c->setLanguage('FR');
        $c->setClientIp('127.0.0.1');
        $c->setCustomer($cust);
        $c->setCreditCard($card);

        $a = [
            'Email' => 'test@test.com',
            'CardCVV' => '123',
            'Language' => 'FR',
            'ClientIp' => '127.0.0.1'
        ];

        $this->assertEquals($c->toArray(), $a);
    }

    public function testEntityMisc()
    {
        $c = new AddCreditCard();
        $c->setFakeArg('test');
        $r = $c->toArray();
        $this->assertEquals($r['FakeArg'], 'test');
        $this->assertEquals($c->getFakeArg(), 'test');
        $this->assertEquals($c->getFakeArgInexistant(), null);
    }
}
