<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class AddDocumentTest extends PHPUnit_Framework_TestCase
{
	public function testExecuteSuccess()
	{
		$result = [
			'DocumentType' => 'IDENTITY_PROOF',
			'Status' => 'valid',
			'Date' => '2019-05-23 09:51:05',
			'Id' => 'WEX3SJ6B9G'
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
		
		$request = new \EasyTransac\Requests\AddDocument();
		$entity = new \EasyTransac\Entities\DocumentRequest();
		$response = $request->execute($entity);
		
		$this->assertTrue($response instanceof \EasyTransac\Responses\StandardResponse);
		$this->assertTrue($response->isSuccess());
		$this->assertTrue($response->getContent() instanceof \EasyTransac\Entities\Document);
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
	
		$request = new \EasyTransac\Requests\AddDocument();
		$entity = new \EasyTransac\Entities\DocumentRequest();
		$response = $request->execute($entity);
	
		$this->assertTrue($response instanceof \EasyTransac\Responses\StandardResponse);
		$this->assertFalse($response->isSuccess());
		$this->assertNotEmpty($response->getErrorMessage());
	}
}

?>