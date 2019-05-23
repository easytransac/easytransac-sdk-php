<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class MakeBankTransferTest extends PHPUnit_Framework_TestCase
{
	public function testExecuteSuccess()
	{
		$result = [
			'Id' => 'ABCD1234',
			'Date' => '2019-05-03 12:38:05',
			'Status' => 'captured',
			'Amount' => '1234',
			'FixFees' => '0.01',
			'Iban' => 'FR1420041010050500013M02606',
			'Bic' => 'CEPAFRPP118',
			'Reference' => 'ENTREPRISE',
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
		
		$request = new \EasyTransac\Requests\MakeBankTransfer();
		$entity = new \EasyTransac\Entities\InitBankTransfer();
		$response = $request->execute($entity);
		
		$this->assertTrue($response instanceof \EasyTransac\Responses\StandardResponse);
		$this->assertTrue($response->isSuccess());
		$this->assertTrue($response->getContent() instanceof \EasyTransac\Entities\BankTransferInfos);
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
	
		$request = new \EasyTransac\Requests\MakeBankTransfer();
		$entity = new \EasyTransac\Entities\InitBankTransfer();
		$response = $request->execute($entity);
	
		$this->assertTrue($response instanceof \EasyTransac\Responses\StandardResponse);
		$this->assertFalse($response->isSuccess());
		$this->assertNotEmpty($response->getErrorMessage());
	}
}

?>