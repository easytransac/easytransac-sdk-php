<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class CreditCardInfoTest extends PHPUnit_Framework_TestCase
{
    protected $c;

    protected function setUp(): void
    {
    	$fixture = $this->getFixture();
    	
        $this->c = new \EasyTransac\Entities\CreditCardInfo();
        $this->c->setCardBin($fixture['CardBIN']);
        $this->c->setCardCountry($fixture['CardCountry']);
        $this->c->setCardType($fixture['CardType']);
        $this->c->setCardBank($fixture['CardBank']);
    }

    public function testGetterSetters()
    {
    	$fixture = $this->getFixture();
    	
    	$this->assertEquals($this->c->getCardBin(), $fixture['CardBIN']);
    	$this->assertEquals($this->c->getCardCountry(), $fixture['CardCountry']);
    	$this->assertEquals($this->c->getCardType(), $fixture['CardType']);
    	$this->assertEquals($this->c->getCardBank(), $fixture['CardBank']);
    }

    public function testToArray()
    {
    	$this->assertEquals($this->c->toArray(), $this->getFixture());
    }
    
    protected function getFixture() 
    {
    	return [
    		"CardBIN" => "1111222233334444",
    		"CardCountry" => "France",
    		"CardType" => "MasterCard",
    		"CardBank" => "Boursorama",
    	];
    }
}