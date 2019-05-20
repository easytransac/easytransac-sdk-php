<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class DoneTransactionTest extends PHPUnit_Framework_TestCase
{
    public function testSettersGetters()
    {
    	$c = new \EasyTransac\Entities\DoneTransaction();
    	$f = $this->getFixture();

    	$client = new \EasyTransac\Entities\Client();
    	$client->hydrate($f['Client']);
    	
    	$c->setAdditionalError($f['AdditionalError']);
    	$c->setAlias($f['Alias']);
    	$c->setAmount($f['Amount']);
    	$c->setDate($f['Date']);
    	$c->setDateChargeback($f['DateChargeback']);
    	$c->setDateRefund($f['DateRefund']);
    	$c->setDateRepresentment($f['DateRepresentment']);
    	$c->setError($f['Error']);
    	$c->setFixFees($f['FixFees']);
    	$c->setMessage($f['Message']);
    	$c->setMultiplePayments($f['MultiplePayments']);
    	$c->setOneClick($f['OneClick']);
    	$c->setOrderId($f['OrderId']);
    	$c->setOriginalPaymentTid($f['OriginalPaymentTid']);
    	$c->setRebill($f['Rebill']);
    	$c->setRequestId($f['RequestId']);
    	$c->setSecure($f['3DSecure']);
    	$c->setSecureUrl($f['3DSecureUrl']);
    	$c->setStatus($f['Status']);
    	$c->setTid($f['Tid']);
    	$c->setUid($f['Uid']);
    	$c->setClient($client);
    	$c->setMandateUrl($f['MandateUrl']);
    	
    	$this->assertEquals($c->getAdditionalError(), $f['AdditionalError']);
    	$this->assertEquals($c->getAlias(), $f['Alias']);
    	$this->assertEquals($c->getAmount(), $f['Amount']);
    	$this->assertEquals($c->getDate(), $f['Date']);
    	$this->assertEquals($c->getDateChargeback(), $f['DateChargeback']);
    	$this->assertEquals($c->getDateRefund(), $f['DateRefund']);
    	$this->assertEquals($c->getDateRepresentment(), $f['DateRepresentment']);
    	$this->assertEquals($c->getError(), $f['Error']);
    	$this->assertEquals($c->getFixFees(), $f['FixFees']);
    	$this->assertEquals($c->getMessage(), $f['Message']);
    	$this->assertEquals($c->getMultiplePayments(), $f['MultiplePayments']);
    	$this->assertEquals($c->getOneClick(), $f['OneClick']);
    	$this->assertEquals($c->getOrderId(), $f['OrderId']);
    	$this->assertEquals($c->getOriginalPaymentTid(), $f['OriginalPaymentTid']);
    	$this->assertEquals($c->getRebill(), $f['Rebill']);
    	$this->assertEquals($c->getRequestId(), $f['RequestId']);
    	$this->assertEquals($c->getSecure(), $f['3DSecure']);
    	$this->assertEquals($c->getSecureUrl(), $f['3DSecureUrl']);
    	$this->assertEquals($c->getStatus(), $f['Status']);
    	$this->assertEquals($c->getTid(), $f['Tid']);
    	$this->assertEquals($c->getUid(), $f['Uid']);
    	$this->assertEquals($c->getClient(), $client);
    	$this->assertEquals($c->getMandateUrl(), $f['MandateUrl']);
    	$this->assertTrue($c->isCaptured());
    	$this->assertFalse($c->isPending());
    	
    	$c->setStatus('pending');
    	$this->assertTrue($c->isPending());
    }

    public function testToArray()
    {
    	$c = new \EasyTransac\Entities\DoneTransaction();
    	$f = $this->getFixture();
    	 
    	$client = new \EasyTransac\Entities\Client();
    	$client->hydrate(json_decode(json_encode($f['Client'])));

    	$c->setAdditionalError($f['AdditionalError']);
    	$c->setAlias($f['Alias']);
    	$c->setAmount($f['Amount']);
    	$c->setDate($f['Date']);
    	$c->setDateChargeback($f['DateChargeback']);
    	$c->setDateRefund($f['DateRefund']);
    	$c->setDateRepresentment($f['DateRepresentment']);
    	$c->setError($f['Error']);
    	$c->setFixFees($f['FixFees']);
    	$c->setMessage($f['Message']);
    	$c->setMultiplePayments($f['MultiplePayments']);
    	$c->setOneClick($f['OneClick']);
    	$c->setOrderId($f['OrderId']);
    	$c->setOriginalPaymentTid($f['OriginalPaymentTid']);
    	$c->setRebill($f['Rebill']);
    	$c->setRequestId($f['RequestId']);
    	$c->setSecure($f['3DSecure']);
    	$c->setSecureUrl($f['3DSecureUrl']);
    	$c->setStatus($f['Status']);
    	$c->setTid($f['Tid']);
    	$c->setUid($f['Uid']);
    	$c->setMandateUrl($f['MandateUrl']);
    	$c->setClient($client);
    	
    	$this->assertEquals($c->toArray(), $this->getFixture(true));
    }
    
    public function testHydrate()
    {
    	$c = new \EasyTransac\Entities\DoneTransaction();
    	$c->hydrate(json_decode(json_encode($this->getFixture())));
    	
    	$this->assertEquals($c->toArray(), $this->getFixture(true));
    }
    
    protected function getFixture($rendered = false)
    {
    	if (!$rendered)
    	{
	    	return [
	    		'RequestId' => 123,
	    		'Tid' => 234,
	    		'Uid' => 345,
	    		'OrderId' => 456,
	    		'Status' => 'captured',
	    		'Date' => '2016-12-06 11:37:00',
	    		'DateRefund' => null,
	    		'DateChargeback' => null,
	    		'DateRepresentment' => null,
	    		'Amount' => 12000,
	    		'FixFees' => 2000,
	    		'Message' => 'Test message',
	    		'3DSecure' => false,
	    		'OneClick' => true,
	    		'OneClick' => true,
	    		'MultiplePayments' => true,
	    		'Rebill' => false,
	    		'OriginalPaymentTid' => 678,
	    		'OriginalPaymentTid' => 678,
	    		'Alias' => 789,
	    		'Error' => null,
	    		'AdditionalError' => null,
	    		'3DSecureUrl' => null,
	    		'MandateUrl' => 'https://myurladdress.com',
    			'Client' => array (
    				'Id' => 'DZxemv4',
    				'Email' => 'johann@movidone.com',
    				'Firstname' => 'Pit',
    				'Lastname' => 'BULL',
    				'Phone' => '0388000000',
    				'Address' => '204 av vosges',
    				'ZipCode' => '67100',
   					'City' => 'STRASB'
    			),
	    	];
    	}
    	else
    	{
    		return [
    			'RequestId' => 123,
    			'Tid' => 234,
    			'Uid' => 345,
    			'OrderId' => 456,
    			'Status' => 'captured',
   				'Date' => '2016-12-06 11:37:00',
    			'Amount' => 12000,
    			'FixFees' => 2000,
   				'Message' => 'Test message',
   				'3DSecure' => false,
    			'OneClick' => true,
    			'OneClick' => true,
    			'MultiplePayments' => true,
    			'Rebill' => false,
   				'OriginalPaymentTid' => 678,
   				'OriginalPaymentTid' => 678,
   				'Alias' => 789,
    			'Id' => 'DZxemv4',
    			'Email' => 'johann@movidone.com',
   				'Firstname' => 'Pit',
  				'Lastname' => 'BULL',
    			'Phone' => '0388000000',
    			'Address' => '204 av vosges',
   				'ZipCode' => '67100',
   				'City' => 'STRASB',
    			'MandateUrl' => 'https://myurladdress.com',
    		];
    	}
    }
}

?>