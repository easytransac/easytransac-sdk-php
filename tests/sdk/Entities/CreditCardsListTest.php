<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class CreditCardsListTest extends PHPUnit_Framework_TestCase
{
    public function testSettersGetters()
    {
    	$list = new \EasyTransac\Entities\CreditCardsList();
    	$cards = [
    		(new \EasyTransac\Entities\CreditCard())->hydrate($this->getFixture()),
    		(new \EasyTransac\Entities\CreditCard())->hydrate($this->getFixture())
    	];
    	
    	$list->setCreditCards($cards);
    	
    	$this->assertEquals($list->getCreditCards(), $cards);
    }

    public function testToArray()
    {
    	$list = new \EasyTransac\Entities\CreditCardsList();
    	$cards = [
    		(new \EasyTransac\Entities\CreditCard())->hydrate(json_decode(json_encode($this->getFixture())))
    	];
    	 
    	$list->setCreditCards($cards);
    	
    	$this->assertEquals($list->toArray(), ['CreditCard' => [$this->getFixture()]]);
    }
    
    public function testHydrate()
    {
    	$list = new \EasyTransac\Entities\CreditCardsList();
    	
    	$cards = json_decode(json_encode([$this->getFixture()]));
    	
    	$list->hydrate($cards);
    	
    	$this->assertEquals($list->toArray(), ['CreditCard' => [$this->getFixture()]]);
    }
    
    protected function getFixture()
    {
    	return [
    		'CardNumber' => '1234567891234567',
    		'CardMonth' => '12',
    		'CardYear' => '2018',
    		'CardCVV' => '123',
    		'CardOwner' => 'Mich',
    		'Alias' => 'a1b2c3d4',
    		'EOM' => '123oem',
    		'KSN' => '123ksn',
    		'CardType' => 'visa',
    		'CardCountry' => 'FR',
    		'LastAccessed' => '2016-12-01 10:00:00',
    	];
    }
}

?>