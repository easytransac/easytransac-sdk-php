<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class BankTransferStatusTest extends PHPUnit_Framework_TestCase
{
    protected $c;
    protected $customer;

    protected function setUp(): void
    {
        $this->c = new \EasyTransac\Entities\BankTransferStatus();

        $this->customer = new \EasyTransac\Entities\Customer();
        $this->customer->setLastname("Toto");
        $this->c->setCustomer($customer);
        $this->c->setPayoutId("112233");
        $this->c->setId("332211");
    }

    public function testGetterSetters()
    {
        $this->assertEquals($this->c->getCustomer(), $this->customer);
        $this->assertEquals($this->c->getPayoutId(), "112233");
        $this->assertEquals($this->c->getId(), "332211");
    }

    public function testToArray()
    {
        $a = [
            "LastName" => "Toto",
            "PayoutId" => "112233",
            "Id" => "332211",
        ];
        $this->assertEquals($this->c->toArray(), $a);
    }
}