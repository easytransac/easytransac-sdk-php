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

        $this->assertEquals($this->getFixture(), $c->toArray());
    }

    public function getFixture(): array
    {
        return [
            'Email' => 'test@test.com',
            'CardCVV' => '123',
            'Language' => 'FR',
            'ClientIp' => '127.0.0.1'
        ];
    }
}
