<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class LimitedTest extends PHPUnit_Framework_TestCase
{
	public function testExecuteNotAllowed()
	{
		$modifier = new \EasyTransac\Core\LimitedModifier();
		$this->setExpectedException(\RuntimeException::class);
		$modifier->execute(\EasyTransac\Core\Services::getInstance(), 'toto', []);
	}

	public function testExecuteGateway()
	{
		$mockCaller = $this->getMockBuilder(\EasyTransac\Core\CurlCaller::class)
			->setMethods(['isTLSv12Available'])
			->getMock();
		
		$mockCaller->expects($this->exactly(3))
			->method('isTLSv12Available')
			->willReturn(false);
		
		\EasyTransac\Core\Services::getInstance()->setCaller($mockCaller);
			
		$modifier = new \EasyTransac\Core\LimitedModifier();
		$modifier->execute(\EasyTransac\Core\Services::getInstance(), '/payment/oneclick', []);
		$this->assertEquals($modifier->getFuncName(), 'https://gateway.easytransac.com');

		$modifier->execute(\EasyTransac\Core\Services::getInstance(), '/payment/listcards', []);
		$this->assertEquals($modifier->getFuncName(), 'https://gateway.easytransac.com');

		$modifier->execute(\EasyTransac\Core\Services::getInstance(), '/payment/page', []);
		$this->assertEquals($modifier->getFuncName(), 'https://gateway.easytransac.com');
	}

	public function testExecuteNormal()
	{
		$mockCaller = $this->getMockBuilder(\EasyTransac\Core\CurlCaller::class)
			->setMethods(['isTLSv12Available'])
			->getMock();
		
		$mockCaller->expects($this->exactly(3))
			->method('isTLSv12Available')
			->willReturn(true);
		
		\EasyTransac\Core\Services::getInstance()->setCaller($mockCaller);
			
		$modifier = new \EasyTransac\Core\LimitedModifier();
		$modifier->execute(\EasyTransac\Core\Services::getInstance(), '/payment/oneclick', []);
		$this->assertEquals($modifier->getFuncName(), 'https://www.easytransac.com/api/payment/oneclick');

		$modifier->execute(\EasyTransac\Core\Services::getInstance(), '/payment/listcards', []);
		$this->assertEquals($modifier->getFuncName(), 'https://www.easytransac.com/api/payment/listcards');

		$modifier->execute(\EasyTransac\Core\Services::getInstance(), '/payment/page', []);
		$this->assertEquals($modifier->getFuncName(), 'https://www.easytransac.com/api/payment/page');
	}
	
	public function testExecuteGatewayHeader()
	{
		
		\EasyTransac\Core\Services::getInstance()->setCaller($this->getMockCaller());
		$modifier = new \EasyTransac\Core\LimitedModifier();
		$modifier->execute(\EasyTransac\Core\Services::getInstance(), '/payment/oneclick', []);
		$headers = \EasyTransac\Core\Services::getInstance()->getCaller()->getHeaders();
		$this->assertTrue(in_array('EASYTRANSAC-ONECLICK:1', $headers));
		
		\EasyTransac\Core\Services::getInstance()->setCaller($this->getMockCaller());
		$modifier = new \EasyTransac\Core\LimitedModifier();
		$modifier->execute(\EasyTransac\Core\Services::getInstance(), '/payment/listcards', []);
		$headers = \EasyTransac\Core\Services::getInstance()->getCaller()->getHeaders();
		$this->assertTrue(in_array('EASYTRANSAC-LISTCARDS:1', $headers));

		\EasyTransac\Core\Services::getInstance()->setCaller($this->getMockCaller());
		$modifier = new \EasyTransac\Core\LimitedModifier();
		$modifier->execute(\EasyTransac\Core\Services::getInstance(), '/payment/page', []);
		$headers = \EasyTransac\Core\Services::getInstance()->getCaller()->getHeaders();
		$this->assertEquals(count($headers), 0);
	}
	
	public function testGetParams()
	{
		$mockCaller = $this->getMockBuilder(\EasyTransac\Core\CurlCaller::class)
			->setMethods(['isTLSv12Available'])
			->getMock();
		
		$mockCaller->expects($this->exactly(1))
			->method('isTLSv12Available')
			->willReturn(false);
		
		$params = ['test' => 'yes'];
		\EasyTransac\Core\Services::getInstance()->setCaller($mockCaller);
		$modifier = new \EasyTransac\Core\LimitedModifier();
		$modifier->execute(\EasyTransac\Core\Services::getInstance(), '/payment/oneclick', $params);
		$this->assertEquals($modifier->getParams(), $params);
	}
	
	protected function getMockCaller()
	{
		$mockCaller = $this->getMockBuilder(\EasyTransac\Core\CurlCaller::class)
			->setMethods(['isTLSv12Available'])
			->getMock();
		
		$mockCaller->expects($this->exactly(1))
			->method('isTLSv12Available')
			->willReturn(false);
		
		return $mockCaller;
	}
}

?>