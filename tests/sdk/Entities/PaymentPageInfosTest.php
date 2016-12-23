<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class PaymentPageInfosTest extends PHPUnit_Framework_TestCase
{
    public function testSettersGetters()
    {
    	$c = new \EasyTransac\Entities\PaymentPageInfos();
    	$f = $this->getFixture();
    	
    	$c->setAmount($f['Amount']);
    	$c->setDate($f['Date']);
    	$c->setEmail($f['Email']);
    	$c->setFixFees($f['FixFees']);
    	$c->setLanguage($f['Language']);
    	$c->setMailSent($f['MailSent']);
    	$c->setPageUrl($f['PageUrl']);
    	$c->setRequestId($f['RequestId']);
    	$c->setSecure($f['3DSecure']);
    	$c->setStatus($f['Status']);
    	
    	$this->assertEquals($c->getAmount(), $f['Amount']);
    	$this->assertEquals($c->getDate(), $f['Date']);
    	$this->assertEquals($c->getEmail(), $f['Email']);
    	$this->assertEquals($c->getFixFees(), $f['FixFees']);
    	$this->assertEquals($c->getLanguage(), $f['Language']);
    	$this->assertEquals($c->getMailSent(), $f['MailSent']);
    	$this->assertEquals($c->getPageUrl(), $f['PageUrl']);
    	$this->assertEquals($c->getRequestId(), $f['RequestId']);
    	$this->assertEquals($c->getSecure(), $f['3DSecure']);
    	$this->assertEquals($c->getStatus(), $f['Status']);
    }

    public function testToArray()
    {
    	$c = new \EasyTransac\Entities\PaymentPageInfos();
    	$f = $this->getFixture();
    	 
    	$c->setAmount($f['Amount']);
    	$c->setDate($f['Date']);
    	$c->setEmail($f['Email']);
    	$c->setFixFees($f['FixFees']);
    	$c->setLanguage($f['Language']);
    	$c->setMailSent($f['MailSent']);
    	$c->setPageUrl($f['PageUrl']);
    	$c->setRequestId($f['RequestId']);
    	$c->setSecure($f['3DSecure']);
    	$c->setStatus($f['Status']);
    	
    	$this->assertEquals($c->toArray(), $f);
    }
    
    public function testHydrate()
    {
    	$c = new \EasyTransac\Entities\PaymentPageInfos();
    	$f = $this->getFixture();
    	$c->hydrate(json_decode(json_encode($f)));
    	
    	$this->assertEquals($c->toArray(), $f);
    }
    
    protected function getFixture()
    {
    	return [
    		'Status' => 'Captured',
    		'Date' => '2016-12-06 12:23',
    		'Amount' => 12000,
    		'FixFees' => 1000,
    		'3DSecure' => false,
    		'PageUrl' => 'https://www.test.com',
    		'MailSent' => true,
    		'RequestId' => 123,
    		'Email' => 'test@test.com',
    		'Language' => 'FRE',
    	];
    }
}

?>