<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class CreditCardTest extends PHPUnit_Framework_TestCase
{
    public function testSettersGetters()
    {
        $c = new \EasyTransac\Entities\CreditCard();
        $f = $this->getFixture();
        
        $c->setAlias($f['Alias']);
        $c->setCountry($f['CardCountry']);
        $c->setCVV($f['CardCVV']);
        $c->setEom($f['EOM']);
        $c->setKsn($f['KSN']);
        $c->setMonth($f['CardMonth']);
        $c->setNumber($f['CardNumber']);
        $c->setOwner($f['CardOwner']);
        $c->setType($f['CardType']);
        $c->setYear($f['CardYear']);
        $c->setLastAccessed($f['LastAccessed']);
        
        $this->assertEquals($c->getAlias(), $f['Alias']);
        $this->assertEquals($c->getCountry(), $f['CardCountry']);
        $this->assertEquals($c->getCVV(), $f['CardCVV']);
        $this->assertEquals($c->getEom(), $f['EOM']);
        $this->assertEquals($c->getKsn(), $f['KSN']);
        $this->assertEquals($c->getMonth(), $f['CardMonth']);
        $this->assertEquals($c->getNumber(), $f['CardNumber']);
        $this->assertEquals($c->getOwner(), $f['CardOwner']);
        $this->assertEquals($c->getType(), $f['CardType']);
        $this->assertEquals($c->getYear(), $f['CardYear']);
        $this->assertEquals($c->getLastAccessed(), $f['LastAccessed']);
    }

    public function testToArray()
    {
    	$c = new \EasyTransac\Entities\CreditCard();
    	$f = $this->getFixture();
    	
    	$c->setAlias($f['Alias']);
    	$c->setCountry($f['CardCountry']);
    	$c->setCVV($f['CardCVV']);
    	$c->setEom($f['EOM']);
    	$c->setKsn($f['KSN']);
    	$c->setMonth($f['CardMonth']);
    	$c->setNumber($f['CardNumber']);
    	$c->setOwner($f['CardOwner']);
    	$c->setType($f['CardType']);
    	$c->setYear($f['CardYear']);
    	$c->setLastAccessed($f['LastAccessed']);
    	
    	$this->assertEquals($c->toArray(), $this->getFixture());
    }
    
    public function testHydrate()
    {
    	$c = new \EasyTransac\Entities\CreditCard();
    	$c->hydrate(json_decode(json_encode($this->getFixture())));
    	$this->assertEquals($c->toArray(), $this->getFixture());
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