<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class RefundTest extends PHPUnit_Framework_TestCase
{
    public function testSettersGetters()
    {
    	$c = new \EasyTransac\Entities\Refund();
    	$f = $this->getFixture();
    	
    	$c->setLanguage($f['Language']);
    	$c->setTid($f['Tid']);
    	$c->setReason($f['Reason']);
    	$c->setAmount($f['Amount']);
    	
    	$this->assertEquals($c->getLanguage(), $f['Language']);
    	$this->assertEquals($c->getTid(), $f['Tid']);
    	$this->assertEquals($c->getReason(), $f['Reason']);
    	$this->assertEquals($c->getAmount(), $f['Amount']);
    }

    public function testToArray()
    {
    	$c = new \EasyTransac\Entities\Refund();
    	$f = $this->getFixture();
    	 
    	$c->setLanguage($f['Language']);
    	$c->setTid($f['Tid']);
    	$c->setAmount($f['Amount']);
    	$c->setReason($f['Reason']);
    	
    	$this->assertEquals($c->toArray(), $f);
    }
    
    public function testHydrate()
    {
    	$c = new \EasyTransac\Entities\Refund();
    	$c->hydrate(json_decode(json_encode($this->getFixture())));

    	$this->assertEquals($c->toArray(), $this->getFixture());
    }
    
    public function getFixture()
    {
    	return [
    		'Language' => 'FRE',
    		'Tid' => '123',
    		'Amount' => '1234',
    		'Reason' => 'i\'m a reason'
    	];
    }
}

?>