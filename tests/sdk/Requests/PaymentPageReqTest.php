<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class PaymentPageReqTest extends PHPUnit_Framework_TestCase
{
	public function testExecuteSuccess()
	{
		$mockCaller = $this->getMockBuilder(\EasyTransac\Core\CurlCaller::class)
			->setMethods(['call'])
			->getMock();
		
		$mockCaller->expects($this->once())
			->method('call')
			->willReturn('{"Code":0,"Signature":"752c14ea195c460bac3c3b7896975ee9fd15eeb7","Result":{"RequestId":"a1b2c3d4e5f6","Status":"pending","Date":"2015-11-2616:12:01","Amount":"29.99","FixFees":"0.01","3DSecure":"yes","PageUrl":"https://www.easytransac.com/pay/a1b2c3d4e5f6","MailSent":"yes","Email":"john@doe.com"}}');
		
		\EasyTransac\Core\Services::getInstance()->setCaller($mockCaller);
		\EasyTransac\Core\Services::getInstance()->removeModifier();
		\EasyTransac\Core\Services::getInstance()->provideAPIKey('abc');
		
		$request = new \EasyTransac\Requests\PaymentPage();
		$entity = new \EasyTransac\Entities\PaymentPageTransaction();
		$response = $request->execute($entity);
		
		$this->assertTrue($response instanceof \EasyTransac\Responses\StandardResponse);
		$this->assertTrue($response->isSuccess());
		$this->assertTrue($response->getContent() instanceof \EasyTransac\Entities\PaymentPageInfos);
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
	
		$request = new \EasyTransac\Requests\PaymentPage();
		$entity = new \EasyTransac\Entities\PaymentPageTransaction();
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
			->willReturn('{"Code":123,"Error":"bad request"}');
	
		\EasyTransac\Core\Services::getInstance()->setCaller($mockCaller);
		\EasyTransac\Core\Services::getInstance()->removeModifier();
		\EasyTransac\Core\Services::getInstance()->provideAPIKey('abc');
	
		$request = new \EasyTransac\Requests\PaymentPage();
		$entity = new \EasyTransac\Entities\PaymentPageTransaction();
		$response = $request->execute($entity);
	
		$this->assertTrue($response instanceof \EasyTransac\Responses\StandardResponse);
		$this->assertFalse($response->isSuccess());
		$this->assertNotEmpty($response->getErrorMessage());
		$this->assertEquals($response->getErrorCode(), 123);
	}
}

?>