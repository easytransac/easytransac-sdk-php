<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class CaptureTest extends PHPUnit_Framework_TestCase
{
	public function testExecuteSuccess()
	{
		$result = [
			'Tid' => 'a1b2c3d4',
			'Status' => 'captured',
			'Date' => '2019-05-23 11:44:05',
			'Amount' => '29.99',
			'FixFees' => '0.01',
			'Message' => 'Transaction refunded',
			'3DSecure' => 'yes',
			'OneClick' => 'no',
			'Alias' => 'a1b2c3d4',
		];
		
		$mockCaller = $this->getMockBuilder(\EasyTransac\Core\CurlCaller::class)
			->setMethods(['call'])
			->getMock();
		
		$mockCaller->expects($this->once())
			->method('call')
			->willReturn(json_encode([
				'Code' => 0,
				'Signature' => \EasyTransac\Core\Security::getSignature($result, 'abc'),
				'Result' => $result
			]));
			
		\EasyTransac\Core\Services::getInstance()->setCaller($mockCaller);
		\EasyTransac\Core\Services::getInstance()->removeModifier();
		\EasyTransac\Core\Services::getInstance()->provideAPIKey('abc');
		
		$request = new \EasyTransac\Requests\Capture();
		$entity = new \EasyTransac\Entities\PaymentCapture();
		$response = $request->execute($entity);
		
		$this->assertTrue($response instanceof \EasyTransac\Responses\StandardResponse);
		$this->assertTrue($response->isSuccess());
		$this->assertTrue($response->getContent() instanceof \EasyTransac\Entities\PaymentCapture);
		$this->assertTrue(count($response->getContent()->toArray()) > 0);
	}
	
	public function testExecuteJsonFailed()
	{
		$mockCaller = $this->getMockBuilder(\EasyTransac\Core\CurlCaller::class)
			->setMethods(['call'])
			->getMock();
	
		$mockCaller->expects($this->once())
			->method('call')
			->willReturn('');
	
		\EasyTransac\Core\Services::getInstance()->setCaller($mockCaller);
		\EasyTransac\Core\Services::getInstance()->removeModifier();
		\EasyTransac\Core\Services::getInstance()->provideAPIKey('abc');
	
		$request = new \EasyTransac\Requests\Capture();
		$entity = new \EasyTransac\Entities\PaymentCapture();
		$response = $request->execute($entity);
	
		$this->assertTrue($response instanceof \EasyTransac\Responses\StandardResponse);
		$this->assertFalse($response->isSuccess());
		$this->assertNotEmpty($response->getErrorMessage());
	}
}

?>