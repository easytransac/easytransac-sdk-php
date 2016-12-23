<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class UserInfosTest extends PHPUnit_Framework_TestCase
{
    public function testSettersGetters()
    {
    	$c = new \EasyTransac\Entities\UserInfos();
    	$f = $this->getFixture();
    	
    	$c->setId($f['Id']);
    	$c->setMessage($f['Message']);
    	
    	$this->assertEquals($c->getId(), $f['Id']);
    	$this->assertEquals($c->getMessage(), $f['Message']);
    }

    public function testToArray()
    {
    	$c = new \EasyTransac\Entities\UserInfos();
    	$f = $this->getFixture();
    	 
    	$c->setId($f['Id']);
    	$c->setMessage($f['Message']);
    	
    	$this->assertEquals($c->toArray(), $this->getFixture());
    }
    
    public function testHydrate()
    {
    	$c = new \EasyTransac\Entities\UserInfos();
    	$c->hydrate(json_decode(json_encode($this->getFixture())));
    	
    	$this->assertEquals($c->toArray(), $this->getFixture());
    }
    
    public function getFixture()
    {
    	return [
    		'Id' => 123,
    		'Message' => 'I\'m a message'
    	];
    }
}

?>