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
    	
    	$this->assertEquals($c->getLanguage(), $f['Language']);
    	$this->assertEquals($c->getTid(), $f['Tid']);
    }

    public function testToArray()
    {
    	$c = new \EasyTransac\Entities\Refund();
    	$f = $this->getFixture();
    	 
    	$c->setLanguage($f['Language']);
    	$c->setTid($f['Tid']);
    	
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
    		'Tid' => '123'
    	];
    }
}

?>