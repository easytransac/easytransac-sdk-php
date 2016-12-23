<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class DebitPaymentReqTest extends PHPUnit_Framework_TestCase
{
	public function testExecuteSuccess()
	{
		$mockCaller = $this->getMockBuilder(\EasyTransac\Core\CurlCaller::class)
			->setMethods(['call'])
			->getMock();
		
		$mockCaller->expects($this->once())
			->method('call')
			->willReturn('{"Code":0,"Signature":"e4a0529abd0497d87bf94090e88371170a424be6","Result":{"RequestId":"a1b2c3d4e5f6","Tid":"xCww78db","Uid":"Abc123","OrderId":"Cde100","Status":"captured","Date":"2015-11-2616:12:01","DateRefund":"2015-11-2616:12:01","Amount":"29.99","FixFees":"0.01","Message":"Paymentwassuccessful","3DSecure":"no","OneClick":"no","Alias":"a1b2c3d4"}}');
			
		\EasyTransac\Core\Services::getInstance()->setCaller($mockCaller);
		\EasyTransac\Core\Services::getInstance()->removeModifier();
		\EasyTransac\Core\Services::getInstance()->provideAPIKey('abc');
		
		$request = new \EasyTransac\Requests\DebitPayment();
		$entity = new \EasyTransac\Entities\DebitTransaction();
		$response = $request->execute($entity);
		
		$this->assertTrue($response instanceof \EasyTransac\Responses\StandardResponse);
		$this->assertTrue($response->isSuccess());
		$this->assertTrue($response->getContent() instanceof \EasyTransac\Entities\DoneTransaction);
		$this->assertTrue(!empty($response->getContent()->toArray()));
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
	
		$request = new \EasyTransac\Requests\DebitPayment();
		$entity = new \EasyTransac\Entities\DebitTransaction();
		$response = $request->execute($entity);
	
		$this->assertTrue($response instanceof \EasyTransac\Responses\StandardResponse);
		$this->assertFalse($response->isSuccess());
		$this->assertNotEmpty($response->getErrorMessage());
	}

	public function testExecuteCode0()
	{
		$mockCaller = $this->getMockBuilder(\EasyTransac\Core\CurlCaller::class)
			->setMethods(['call'])
			->getMock();
	
		$mockCaller->expects($this->once())
			->method('call')
			->willReturn('{"Code":123,"Error":"bad request","Signature":"34419f91e080e64caddc429fde0ac1ac965012fe"}');
	
		\EasyTransac\Core\Services::getInstance()->setCaller($mockCaller);
		\EasyTransac\Core\Services::getInstance()->removeModifier();
		\EasyTransac\Core\Services::getInstance()->provideAPIKey('abc');
	
		$request = new \EasyTransac\Requests\DebitPayment();
		$entity = new \EasyTransac\Entities\DebitTransaction();
		$response = $request->execute($entity);
	
		$this->assertTrue($response instanceof \EasyTransac\Responses\StandardResponse);
		$this->assertFalse($response->isSuccess());
		$this->assertNotEmpty($response->getErrorMessage());
		$this->assertEquals($response->getErrorCode(), 123);
	}
}

?>