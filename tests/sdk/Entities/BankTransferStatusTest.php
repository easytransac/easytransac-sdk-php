<?php

use EasyTransac\Entities\BankTransferStatus;
use EasyTransac\Entities\Customer;
use PHPUnit\Framework\TestCase;

class BankTransferStatusTest extends TestCase
{
    protected $c;
    protected $customer;

    protected function setUp(): void
    {
        $fixture = $this->getFixture();
        $this->c = new BankTransferStatus();

        $this->customer = new Customer();
        $this->customer->setClientId($fixture['ClientId']);
        $this->c->setCustomer($this->customer);
        $this->c->setPayoutId($fixture['PayoutId']);
    }

    public function testToArray()
    {
        $this->assertEquals($this->c->toArray(), $this->getFixture());
    }

    protected function getFixture(): array
    {
        return [
            "ClientId" => "a1b2c3",
            "PayoutId" => "112233",
        ];
    }
}
