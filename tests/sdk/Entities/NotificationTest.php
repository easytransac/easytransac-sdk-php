<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class NotificationTest extends PHPUnit_Framework_TestCase
{
    public function testHydrate()
    {
		$f = $this->getFixture(true);
    	$c = new \EasyTransac\Entities\Notification();
    	$c->hydrate(json_decode(json_encode($this->getFixture())));

    	$this->assertEquals($c->toArray(), $f);

		$c = new \EasyTransac\Entities\Notification();
		$c->hydrate(json_decode(json_encode($this->getFixture())));
		$this->assertEquals($c->getAlias(), $f['Alias']);
    	$this->assertEquals($c->getAmount(), $f['Amount']);
    	$this->assertEquals($c->getCardNumber(), $f['CardNumber']);
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
		$this->assertTrue($c->getClient() instanceof \EasyTransac\Entities\Client);
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
	    		'3DSecure' => 'no',
	    		'OneClick' => 'yes',
	    		'Alias' => 'abcdef',
	    		'CardNumber' => '789456123',
	    		'Test' => 'no',
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
   				'3DSecure' => 'no',
    			'OneClick' => 'yes',
    			'Alias' => 'abcdef',
    			'CardNumber' => '789456123',
   				'Test' => 'no',
   				'Firstname' => 'mich',
   				'Error' => 'Error test',
    			'Signature' => 'abc123'
    		];
    	}
    }
}

?>
