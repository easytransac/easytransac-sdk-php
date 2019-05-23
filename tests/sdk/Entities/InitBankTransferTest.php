<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class InitBankTransferTest extends PHPUnit_Framework_TestCase
{
    protected $c;
    protected $customer;

    protected function setUp(): void
    {
    	$fixture = $this->getFixture();
    	
        $this->c = new \EasyTransac\Entities\InitBankTransfer();
        $this->customer = new \EasyTransac\Entities\Customer();
        $this->customer->setClientId($fixture['ClientId']);

        $this->c->setCustomer($this->customer);
        $this->c->setAmount($fixture['Amount']);
        $this->c->setReference($fixture['Reference']);
    }

    public function testGetterSetters()
    {
    	$fixture = $this->getFixture();
    	
    	$this->assertEquals($this->customer->getClientId(), $fixture['ClientId']);
    	$this->assertEquals($this->c->getAmount(), $fixture['Amount']);
    	$this->assertEquals($this->c->getReference(), $fixture['Reference']);
    }

    public function testToArray()
    {
        $this->assertEquals($this->c->toArray(), $this->getFixture());
    }
    
    public function getFixture() 
    {
		return [
			'Reference' => 'a1b2c3',
			'Amount' => '1234',
			'Reference' => 'a9z8e7',
			'ClientId' => 'a4f7g53'
		];
    }
}