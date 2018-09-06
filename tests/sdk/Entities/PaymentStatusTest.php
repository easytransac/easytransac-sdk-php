<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class PaymentStatusTest extends PHPUnit_Framework_TestCase
{
    public function testSettersGetters()
    {
    	$c = new \EasyTransac\Entities\PaymentStatus();
    	$f = $this->getFixture();
    	
    	$c->setLanguage($f['Language']);
    	$c->setTid($f['Tid']);
	    $c->setOrderId($f['OrderId']);
	    $c->setRequestId($f['RequestId']);
    	
    	$this->assertEquals($c->getLanguage(), $f['Language']);
    	$this->assertEquals($c->getTid(), $f['Tid']);
	    $this->assertEquals($c->getOrderId(), $f['OrderId']);
	    $this->assertEquals($c->getRequestId(), $f['RequestId']);
    }

    public function testToArray()
    {
    	$c = new \EasyTransac\Entities\PaymentStatus();
    	$f = $this->getFixture();
    	 
    	$c->setLanguage($f['Language']);
    	$c->setTid($f['Tid']);
	    $c->setOrderId($f['OrderId']);
	    $c->setRequestId($f['RequestId']);
    	
    	$this->assertEquals($c->toArray(), $f);
    }
    
    public function testHydrate()
    {
    	$c = new \EasyTransac\Entities\PaymentStatus();
    	$c->hydrate(json_decode(json_encode($this->getFixture())));

    	$this->assertEquals($c->toArray(), $this->getFixture());
    }
    
    public function getFixture()
    {
    	return [
    		'Language' => 'FRE',
    		'Tid' => '123',
		    'OrderId' => 'abc123',
		    'RequestId' => '123abc'
    	];
    }
}

?>