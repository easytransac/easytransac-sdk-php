<?php

use PHPUnit\Framework\TestCase;

class InitBankTransferTest extends TestCase
{
    protected $c;
    protected $customer;

    protected function setUp()
    {
        $fixture = $this->getFixture();

        $this->c = new EasyTransac\Entities\InitBankTransfer();
        $this->customer = new EasyTransac\Entities\Customer();
        $this->customer->setClientId($fixture['ClientId']);

        $this->c->setCustomer($this->customer);
        $this->c->setAmount($fixture['Amount']);
        $this->c->setReference($fixture['Reference']);
    }

    public function testToArray()
    {
        $this->assertEquals($this->c->toArray(), $this->getFixture());
    }

    public function getFixture()
    {
        return [
            'Amount' => '1234',
            'Reference' => 'a9z8e7',
            'ClientId' => 'a4f7g53'
        ];
    }
}
