<?php

use EasyTransac\Entities\Customer;
use EasyTransac\Entities\PayByBank;
use PHPUnit\Framework\TestCase;

class PayByBankTest extends TestCase
{
    public function testToArray()
    {
        $c = new PayByBank();
        $f = $this->getFixture();

        $customer = new Customer();
        $customer->setLastname($f['Customer']['Lastname']);
        $customer->setEmail($f['Customer']['Email']);

        $c->setAmount($f['Amount']);
        $c->setOrderId($f['OrderId']);
        $c->setDescription($f['Description']);
        $c->setClientIp($f['ClientIp']);
        $c->setCustomer($customer);
        $c->setUserAgent($f['UserAgent']);
        $c->setLanguage($f['Language']);
        $c->setReturnUrl($f['ReturnUrl']);

        $this->assertEquals($c->toArray(), $this->getFixture(true));
    }


    public function testHydrate()
    {
        $c = new PayByBank();
        $c->hydrate(json_decode(json_encode($this->getFixture())));

        $this->assertEquals($c->toArray(), $this->getFixture(true));
    }

    protected function getFixture($rendered = false): array
    {
        if (!$rendered) {
            return [
                'Amount' => 12300,
                'OrderId' => 10,
                'Description' => 'Description of the transaction',
                'ClientIp' => '127.0.0.1',
                'Customer' => [
                    'Lastname' => 'Doe',
                    'Email'   => 'test@test.com',
                ],
                'UserAgent' => 'ua',
                'Language' => 'FRE',
                'ReturnUrl' => 'https://toto.com'
            ];
        } else {
            return [
                'Amount' => 12300,
                'OrderId' => 10,
                'Description' => 'Description of the transaction',
                'ClientIp' => '127.0.0.1',
                'Lastname' => 'Doe',
                'Email' => 'test@test.com',
                'UserAgent' => 'ua',
                'Language' => 'FRE',
                'ReturnUrl' => 'https://toto.com'
            ];
        }
    }
}
