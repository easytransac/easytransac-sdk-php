<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class NotificationTest extends PHPUnit_Framework_TestCase
{
    public function testSettersGetters()
    {
    	$c = new \EasyTransac\Entities\Notification();
    	$f = $this->getFixture();
    	
    	$client = new \EasyTransac\Entities\Client();
    	$client->setFirstname($f['Client']['Firstname']);
    	
    	$c->setAlias($f['Alias']);
    	$c->setAmount($f['Amount']);
    	$c->setCardNumber($f['CardNumber']);
    	$c->setClient($client);
    	$c->setCurrency($f['Currency']);
    	$c->setDate($f['Date']);
    	$c->setFixFees($f['FixFees']);
    	$c->setMessage($f['Message']);
    	$c->setOneClick($f['OneClick']);
    	$c->setOperationType($f['OperationType']);
    	$c->setOrderId($f['OrderId']);
    	$c->setRequestId($f['RequestId']);
    	$c->setSecure($f['3DSecure']);
    	$c->setSignature($f['Signature']);
    	$c->setStatus($f['Status']);
    	$c->setTest($f['Test']);
    	$c->setTid($f['Tid']);
    	$c->setUid($f['Uid']);
    	$c->setError($f['Error']);
    	
    	$this->assertEquals($c->getAlias(), $f['Alias']);
    	$this->assertEquals($c->getAmount(), $f['Amount']);
    	$this->assertEquals($c->getCardNumber(), $f['CardNumber']);
    	$this->assertEquals($c->getClient(), $client);
    	$this->assertEquals($c->getDate(), $f['Date']);
    	$this->assertEquals($c->getFixFees(), $f['FixFees']);
    	$this->assertEquals($c->getMessage(), $f['Message']);
    	$this->assertEquals($c->getOneClick(), $f['OneClick']);
    	$this->assertEquals($c->getOperationType(), $f['OperationType']);
    	$this->assertEquals($c->getOrderId(), $f['OrderId']);
    	$this->assertEquals($c->getRequestId(), $f['RequestId']);
    	$this->assertEquals($c->getSecure(), $f['3DSecure']);
    	$this->assertEquals($c->getSignature(), $f['Signature']);
    	$this->assertEquals($c->getStatus(), $f['Status']);
    	$this->assertEquals($c->getTest(), $f['Test']);
    	$this->assertEquals($c->getTid(), $f['Tid']);
    	$this->assertEquals($c->getUid(), $f['Uid']);
    	$this->assertEquals($c->getCurrency(), $f['Currency']);
    	$this->assertEquals($c->getError(), $f['Error']);
    }

    public function testToArray()
    {
    	$c = new \EasyTransac\Entities\Notification();
    	$f = $this->getFixture();
    	 
    	$client = new \EasyTransac\Entities\Client();
    	$client->setFirstname($f['Client']['Firstname']);
    	 
    	$c->setAlias($f['Alias']);
    	$c->setAmount($f['Amount']);
    	$c->setCardNumber($f['CardNumber']);
    	$c->setClient($client);
    	$c->setCurrency($f['Currency']);
    	$c->setDate($f['Date']);
    	$c->setFixFees($f['FixFees']);
    	$c->setMessage($f['Message']);
    	$c->setOneClick($f['OneClick']);
    	$c->setOperationType($f['OperationType']);
    	$c->setOrderId($f['OrderId']);
    	$c->setRequestId($f['RequestId']);
    	$c->setSecure($f['3DSecure']);
    	$c->setSignature($f['Signature']);
    	$c->setStatus($f['Status']);
    	$c->setTest($f['Test']);
    	$c->setTid($f['Tid']);
    	$c->setUid($f['Uid']);
    	$c->setError($f['Error']);
    	
    	$this->assertEquals($c->toArray(), $this->getFixture(true));
    }
    
    public function testHydrate()
    {
    	$c = new \EasyTransac\Entities\Notification();
    	$c->hydrate(json_decode(json_encode($this->getFixture())));
    	
    	$this->assertEquals($c->toArray(), $this->getFixture(true));
    }
    
    public function getFixture($rendered = false)
    {
    	if (!$rendered)
    	{
	    	return [
	    		'OperationType' => 'payment',
	    		'RequestId' => 123,
	    		'Tid' => 234,
	    		'Uid' => 345,
	    		'OrderId' => 456,
	    		'Status' => 'captured',
	    		'Date' => '2016-12-12 16:20:00',
	    		'Amount' => 12000,
	    		'Currency' => 'EUR',
	    		'FixFees' => 1200,
	    		'Message' => '',
	    		'3DSecure' => false,
	    		'OneClick' => true,
	    		'Alias' => 'abcdef',
	    		'CardNumber' => '789456123',
	    		'Test' => false,
	    		'Error' => 'Error test',
	    		'Client' => [
	    			'Firstname' => 'mich'
	    		],
	    		'Signature' => 'abc123'
	    	];
    	}
    	else
    	{
    		return [
    			'OperationType' => 'payment',
    			'RequestId' => 123,
    			'Tid' => 234,
    			'Uid' => 345,
   				'OrderId' => 456,
   				'Status' => 'captured',
    			'Date' => '2016-12-12 16:20:00',
    			'Amount' => 12000,
    			'Currency' => 'EUR',
    			'FixFees' => 1200,
   				'Message' => '',
   				'3DSecure' => false,
    			'OneClick' => true,
    			'Alias' => 'abcdef',
    			'CardNumber' => '789456123',
   				'Test' => false,
   				'Firstname' => 'mich',
   				'Error' => 'Error test',
    			'Signature' => 'abc123'
    		];
    	}
    }
}

?>