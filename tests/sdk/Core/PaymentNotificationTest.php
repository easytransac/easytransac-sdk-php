<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class PaymentNotificationTest extends PHPUnit_Framework_TestCase
{
	public function testGetContent()
	{
		$response = \EasyTransac\Core\PaymentNotification::getContent($this->getFixture(), 'myApiKey');
		$this->assertEquals($response->toArray(), $this->getFixture(true));
	}

	public function testGetContentFailed()
	{
		$f = $this->getFixture();
		unset($f['Tid']);
		$response = \EasyTransac\Core\PaymentNotification::getContent($f, 'myApiKey');
		$this->assertFalse($response);
	}
	
	protected function getFixture($rendered = false)
	{
		if (!$rendered)
		{
			return array (
				'OperationType' => 'payment',
				'RequestId' => 'KW5o8AEx98yx',
				'Tid' => '9XLknkv8',
				'Uid' => '2',
				'OrderId' => '72',
				'Status' => 'captured',
				'Date' => '2016-11-30 11:27:46',
				'Amount' => '18.00',
				'Currency' => 'EUR',
				'FixFees' => '0.83',
				'Message' => 'Payment was successful',
				'3DSecure' => 'no',
				'OneClick' => 'no',
				'Alias' => '412J33',
				'CardNumber' => '************0025',
				'Test' => 'yes',
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
				'Signature' => '1e4b2037014d77e654043d97fea20e69757eaa0f' 
			);
		}
		else
		{
			return array (
				'OperationType' => 'payment',
				'RequestId' => 'KW5o8AEx98yx',
				'Tid' => '9XLknkv8',
				'Uid' => '2',
				'OrderId' => '72',
				'Status' => 'captured',
				'Date' => '2016-11-30 11:27:46',
				'Amount' => '18.00',
				'Currency' => 'EUR',
				'FixFees' => '0.83',
				'Message' => 'Payment was successful',
				'3DSecure' => false,
				'OneClick' => false,
				'Alias' => '412J33',
				'CardNumber' => '************0025',
				'Test' => true,
				'Id' => 'DZxemv4',
				'Email' => 'johann@movidone.com',
				'Firstname' => 'Pit',
				'Lastname' => 'BULL',
				'Phone' => '0388000000',
				'Address' => '204 av vosges',
				'ZipCode' => '67100',
				'City' => 'STRASB',
				'Signature' => '1e4b2037014d77e654043d97fea20e69757eaa0f'
			);
		}
	}
}

?>