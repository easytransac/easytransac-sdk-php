<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class BankTransferStatusTest extends PHPUnit_Framework_TestCase
{
    protected $c;
    protected $customer;

    protected function setUp(): void
    {
    	$fixture = $this->getFixture();
        $this->c = new \EasyTransac\Entities\BankTransferStatus();

        $this->customer = new \EasyTransac\Entities\Customer();
        $this->customer->setClientId($fixture['ClientId']);
        $this->c->setCustomer($this->customer);
        $this->c->setPayoutId($fixture['PayoutId']);
    }

    public function testToArray()
    {
        $this->assertEquals($this->c->toArray(), $this->getFixture());
    }

    protected function getFixture()
    {
    	return [
    		"ClientId" => "a1b2c3",
    		"PayoutId" => "112233",
    	];
    }
}
