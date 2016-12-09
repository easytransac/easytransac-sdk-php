<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class ServicesTest extends PHPUnit_Framework_TestCase
{
	public function testGetInstance()
	{
		$this->assertTrue(\EasyTransac\Core\Services::getInstance() instanceof \EasyTransac\Core\Services);
	}
	
	public function testModifier()
	{
		$modifier = new \EasyTransac\Core\LimitedModifier();
		\EasyTransac\Core\Services::getInstance()->setModifier($modifier);
		$this->assertEquals(\EasyTransac\Core\Services::getInstance()->getModifier(), $modifier);
		
		\EasyTransac\Core\Services::getInstance()->removeModifier();
		$this->assertEquals(\EasyTransac\Core\Services::getInstance()->getModifier(), null);
	}
	
	public function testCaller()
	{
		$caller = new \EasyTransac\Core\CurlCaller();
		\EasyTransac\Core\Services::getInstance()->setCaller($caller);
		$this->assertEquals(\EasyTransac\Core\Services::getInstance()->getCaller(), $caller);
	}
	
	public function testDebug()
	{
		\EasyTransac\Core\Services::getInstance()->setDebug(true);
		$this->assertTrue(\EasyTransac\Core\Services::getInstance()->isDebug());

		\EasyTransac\Core\Services::getInstance()->setDebug(false);
		$this->assertFalse(\EasyTransac\Core\Services::getInstance()->isDebug());
	}
	
	public function testCallExceptionApiKey()
	{
		$this->setExpectedException(\RuntimeException::class);
		$args = [];
		\EasyTransac\Core\Services::getInstance()->provideAPIKey(null);
		\EasyTransac\Core\Services::getInstance()->call('test', $args);
	}

	public function testCallExceptionCaller()
	{
		$this->setExpectedException(\RuntimeException::class);
		\EasyTransac\Core\Services::getInstance()->provideAPIKey('test');
		\EasyTransac\Core\Services::getInstance()->removeCaller();
		$args = [];
		\EasyTransac\Core\Services::getInstance()->call('test', $args);
	}
	
	public function testCallWithoutModifier()
	{
		$mockCaller = $this->getMockBuilder(\EasyTransac\Core\CurlCaller::class)
			->setMethods(['call'])
			->getMock();
		
		$mockCaller->expects($this->once())
			->method('call')
			->willReturn('{"Code":0}');
		
		\EasyTransac\Core\Services::getInstance()->setCaller($mockCaller);
		\EasyTransac\Core\Services::getInstance()->provideAPIKey('test');
		\EasyTransac\Core\Services::getInstance()->removeModifier();
		
		$args = [];
		$response = \EasyTransac\Core\Services::getInstance()->call('test', $args);
		$this->assertEquals($response, '{"Code":0}');
	}

	public function testCallExceptionCallerCall()
	{
		$mockCaller = $this->getMockBuilder(\EasyTransac\Core\CurlCaller::class)
			->setMethods(['call'])
			->getMock();
		
		$mockCaller->expects($this->once())
			->method('call')
			->will($this->throwException(new RuntimeException('Caller::call failed')));
		
		\EasyTransac\Core\Services::getInstance()->setCaller($mockCaller);
		\EasyTransac\Core\Services::getInstance()->provideAPIKey('test');
		\EasyTransac\Core\Services::getInstance()->removeModifier();
		
		$this->setExpectedException(\RuntimeException::class);
		$args = [];
		\EasyTransac\Core\Services::getInstance()->call('test', $args);
	}

	public function testCallWithModifierLimitedWithNotAuthorizedUrl()
	{
		\EasyTransac\Core\Services::getInstance()->setCaller(new \EasyTransac\Core\CurlCaller());
		\EasyTransac\Core\Services::getInstance()->provideAPIKey('test');
		\EasyTransac\Core\Services::getInstance()->setModifier(new \EasyTransac\Core\LimitedModifier());
		
		$this->setExpectedException(\RuntimeException::class);
		$args = [];
		\EasyTransac\Core\Services::getInstance()->call('test', $args);
	}

	public function testCallWithModifierLimitedWithAuthorizedUrl()
	{
		$mockCaller = $this->getMockBuilder(\EasyTransac\Core\CurlCaller::class)
			->setMethods(['call'])
			->getMock();
		
		$mockCaller->expects($this->once())
			->method('call')
			->willReturn('{"Code":0}');
		
		\EasyTransac\Core\Services::getInstance()->setCaller($mockCaller);
		\EasyTransac\Core\Services::getInstance()->provideAPIKey('test');
		\EasyTransac\Core\Services::getInstance()->setModifier(new \EasyTransac\Core\LimitedModifier());
		
		$args = [];
		$response = \EasyTransac\Core\Services::getInstance()->call('/payment/oneclick', $args);
		
		$this->assertEquals($response, '{"Code":0}');
	}
}

?>