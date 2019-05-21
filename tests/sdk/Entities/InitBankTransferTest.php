<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class InitBankTransferTest extends PHPUnit_Framework_TestCase
{
    protected $c;
    protected $customer;

    protected function setUp(): void
    {
        $this->c = new \EasyTransac\Entities\InitBankTransfer();
        $this->customer = new \EasyTransac\Entities\Customer();
        $this->customer->setLastname("Jean");

        $this->c->setCustomer($this->customer);
        $this->c->setAmount("100");
        $this->c->setReference("azerty");
    }

    public function testGetterSetters()
    {
        $this->asserEquals($this->c->getCustomer(), $this->customer);
        $this->asserEquals($this->c->getAmount(), "100");
        $this->asserEquals($this->c->getReference(), "azerty");
    }

    public function testToArray()
    {
        $a = [
            "LastName" => $this->c->getCustomer()->getLastName(),
            "Amount" => "100",
            "Reference" => "azerty",
        ];

        $this->assertEquals($this->c->toArray(), $a);
    }
}