<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class PaymentPageCancellationInfos extends PHPUnit_Framework_TestCase
{
    protected $c;

    protected function setUp()
    {
    	$fixture = $this->getFixture();
    	
        $this->c = new \EasyTransac\Entities\PaymentPageCancellationInfos();
        $this->c->setRequestId($fixture['RequestId']);
        $this->c->setStatus($fixture['Status']);
        $this->c->setDate($fixture['Date']);
        $this->c->setDateSent($fixture['DateSent']);
        $this->c->setAmount($fixture['Amount']);
        $this->c->setSecure($fixture['3DSecure']);
        $this->c->setPageUrl($fixture['PageUrl']);
        $this->c->setEmail($fixture['Email']);
        $this->c->setLanguage($fixture['Language']);
    }

    public function testSetterGetters()
    {
    	$fixture = $this->getFixture();
    	
    	$this->assertEquals($this->c->getRequestId(), $fixture['RequestId']);
    	$this->assertEquals($this->c->getStatus(), $fixture['Status']);
    	$this->assertEquals($this->c->getDate(), $fixture['Date']);
    	$this->assertEquals($this->c->getDateSent(), $fixture['DateSent']);
    	$this->assertEquals($this->c->getAmount(), $fixture['Amount']);
    	$this->assertEquals($this->c->getSecure(), $fixture['3DSecure']);
    	$this->assertEquals($this->c->getPageUrl(), $fixture['PageUrl']);
    	$this->assertEquals($this->c->getEmail(), $fixture['Email']);
    	$this->assertEquals($this->c->getLanguage(), $fixture['Language']);
    }

    public function testToArray()
    {
        $this->assertEquals($this->c->toArray(), $this->getFixture());
    }
    
    protected function getFixture() 
    {
    	return [
    		"RequestId" => "111",
    		"Status" => "captured",
    		"Date" => "2019-05-21 17:07:30",
    		"DateSent" => "2019-05-21 17:00:30",
    		"Amount" => "100",
    		"3DSecure" => "no",
    		"PageUrl" => "www.easytransac.com",
    		"Email" => "contact@easytransac.com",
    		"Language" => "FRE",
    	];
    }
}