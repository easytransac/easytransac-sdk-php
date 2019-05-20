<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class OneClickTransactionTest extends PHPUnit_Framework_TestCase
{
    public function testSettersGetters()
    {
    	$c = new \EasyTransac\Entities\OneClickTransaction();
    	$f = $this->getFixture();
    	
    	$c->setAlias($f['Alias']);
    	$c->setAmount($f['Amount']);
    	$c->setClientIp($f['ClientIp']);
    	$c->setDescription($f['Description']);
    	$c->setOrderId($f['OrderId']);
    	$c->setUid($f['Uid']);
    	$c->setLanguage($f['Language']);
    	$c->setUserAgent($f['UserAgent']);
    	$c->setPayToEmail($f['PayToEmail']);
    	$c->setClientId($f['ClientId']);
    	$c->setVersion($f['Version']);
    	
    	$this->assertEquals($c->getAlias(), $f['Alias']);
    	$this->assertEquals($c->getAmount(), $f['Amount']);
    	$this->assertEquals($c->getClientIp(), $f['ClientIp']);
    	$this->assertEquals($c->getDescription(), $f['Description']);
    	$this->assertEquals($c->getOrderId(), $f['OrderId']);
    	$this->assertEquals($c->getUid(), $f['Uid']);
    	$this->assertEquals($c->getLanguage(), $f['Language']);
    	$this->assertEquals($c->getUserAgent(), $f['UserAgent']);
    	$this->assertEquals($c->getPayToEmail(), $f['PayToEmail']);
    	$this->assertEquals($c->getClientId(), $f['ClientId']);
    	$this->assertEquals($c->getVersion(), $f['Version']);
    }

    public function testToArray()
    {
    	$c = new \EasyTransac\Entities\OneClickTransaction();
    	$f = $this->getFixture();
    	 
    	$c->setAlias($f['Alias']);
    	$c->setAmount($f['Amount']);
    	$c->setClientIp($f['ClientIp']);
    	$c->setDescription($f['Description']);
    	$c->setOrderId($f['OrderId']);
    	$c->setUid($f['Uid']);
    	$c->setLanguage($f['Language']);
    	$c->setUserAgent($f['UserAgent']);
    	$c->setPayToEmail($f['PayToEmail']);
    	$c->setClientId($f['ClientId']);
    	$c->setVersion($f['Version']);
    	
    	$this->assertEquals($c->toArray(), $f);
    }
    
    public function testHydrate()
    {
    	$c = new \EasyTransac\Entities\OneClickTransaction();
    	$c->hydrate(json_decode(json_encode($this->getFixture())));
    	 
    	$this->assertEquals($c->toArray(), $this->getFixture(true));
    }
    
    protected function getFixture($rendered = false)
    {
    	return [
    		'Amount' => 12000,
    		'Uid' => 123,
    		'OrderId' => 234,
    		'Description' => 345,
    		'ClientIp' => '127.0.0.1',
    		'Alias' => 546,
    		'Language' => 'FRE',
    		'UserAgent' => 'Firefox',
    		'PayToEmail' => 'test@test.com',
    		'ClientId' => 'abc123',
    		'Version' => '1.1'
    	];
    }
}

?>