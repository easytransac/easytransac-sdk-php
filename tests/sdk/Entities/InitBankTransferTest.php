<?php

use EasyTransac\Entities\Customer;
use EasyTransac\Entities\InitBankTransfer;
use PHPUnit\Framework\TestCase;

class InitBankTransferTest extends TestCase
{
    protected $c;
    protected $customer;

    protected function setUp(): void
    {
        $fixture = $this->getFixture();

        $this->c = new InitBankTransfer();
        $this->customer = new Customer();
        $this->customer->setClientId($fixture['ClientId']);

        $this->c->setCustomer($this->customer);
        $this->c->setAmount($fixture['Amount']);
        $this->c->setReference($fixture['Reference']);
    }

    public function testToArray()
    {
        $this->assertEquals($this->c->toArray(), $this->getFixture());
    }

    public function getFixture(): array
    {
        return [
            'Reference' => 'a1b2c3',
            'Amount' => '1234',
            'Reference' => 'a9z8e7',
            'ClientId' => 'a4f7g53'
        ];
    }
}
