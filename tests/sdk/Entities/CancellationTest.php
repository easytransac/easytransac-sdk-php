<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class CancellationTest extends PHPUnit_Framework_TestCase
{
    public function testSettersGetters()
    {
    	$fixture = $this->getFixture();
    	
    	$c = new \EasyTransac\Entities\Cancellation();
    	
    	$c->setLanguage($fixture['Language']);
    	$c->setTid($fixture['Tid']);
    	$c->setRequestId($fixture['RequestId']);
    	
    	$this->assertEquals($c->getLanguage(), $fixture['Language']);
    	$this->assertEquals($c->getTid(), $fixture['Tid']);
    	$this->assertEquals($c->getRequestId(), $fixture['RequestId']);
    }

    public function testToArray()
    {
    	$fixture = $this->getFixture();
    	
    	$c = new \EasyTransac\Entities\Cancellation();
    	$c->setLanguage($fixture['Language']);
    	$c->setTid($fixture['Tid']);
    	$c->setRequestId($fixture['RequestId']);
    	
    	$this->assertEquals($c->toArray(), $fixture);
    }
    
    protected function getFixture() 
    {
    	return [
    		'Language' => 'FRE',
    		'Tid' => '123456',
    		'RequestId' => '123'
    	];
    }
}

?>