<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class CancellationInfosTest extends PHPUnit_Framework_TestCase
{
    public function testSettersGetters()
    {
    	$c = new \EasyTransac\Entities\CancellationInfos();
    	
    	$c->setDate('2016-12-01');
    	$c->setMessage('test message');
    	$c->setOriginalPaymentTid('123456');
    	
    	$this->assertEquals($c->getDate(), '2016-12-01');
    	$this->assertEquals($c->getMessage(), 'test message');
    	$this->assertEquals($c->getOriginalPaymentTid(), '123456');
    }

    public function testToArray()
    {
    	$c = new \EasyTransac\Entities\CancellationInfos();
    	 
    	$c->setDate('2016-12-01');
    	$c->setMessage('test message');
    	$c->setOriginalPaymentTid('123456');
    	
    	$a = [
    		'Date' => '2016-12-01',
    		'Message' => 'test message',
    		'OriginalPaymentTid' => '123456'
    	];
    	
    	$this->assertEquals($c->toArray(), $a);
    }
}

?>