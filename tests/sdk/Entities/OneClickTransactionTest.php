<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class OneClickTransactionTest extends PHPUnit_Framework_TestCase
{

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
    	$c->setSecure($f['3DS']);
    	$c->setReturnUrl($f['ReturnUrl']);
    	$c->setCVV($f['CardCVV']);
    	$c->setPreAuth($f['PreAuth']);
    	$c->setPreAuthDuration($f['PreAuthDuration']);

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
    		'3DS' => 'yes',
    		'ReturnUrl' => 'https://www.easytransac.com',
    		'CardCVV' => '123',
    		'PreAuth' => 'no',
    		'PreAuthDuration' => '10',
    	];
    }
}

?>
