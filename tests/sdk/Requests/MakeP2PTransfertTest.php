<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class MakeP2PTransferTest extends PHPUnit_Framework_TestCase
{
	const API_KEY = 'abc';
	public function testExecuteSuccess()
	{
		$mockCaller = $this->getMockBuilder(\EasyTransac\Core\CurlCaller::class)
			->setMethods(['call'])
			->getMock();

		$mockCaller->expects($this->once())
			->method('call')
			->willReturn(json_encode([
				'Code' => 0,
				'Signature' => \EasyTransac\Core\Security::getSignature(
					$this->getFixtureReturn(),
					self::API_KEY
				),
				'Result' => $this->getFixtureReturn()
			]));

		\EasyTransac\Core\Services::getInstance()->setCaller($mockCaller);
		\EasyTransac\Core\Services::getInstance()->removeModifier();
		\EasyTransac\Core\Services::getInstance()->provideAPIKey(self::API_KEY);

		$request = new \EasyTransac\Requests\MakeP2PTransfer();
		$entity = new \EasyTransac\Entities\P2PTransfer();
		$response = $request->execute($entity);

		$this->assertTrue($response instanceof \EasyTransac\Responses\StandardResponse);
		$this->assertTrue($response->isSuccess());
		$this->assertTrue($response->getContent() instanceof \EasyTransac\Entities\P2PTransfer);
	}

	protected function getFixtureReturn()
	{
		return [
			"From" => 1234,
			"To" => 5678,
			"Amount" => 29.99,
			"Status" => "captured",
			"OriginalTid" => "abcd1234",
			"Date" => "2019-06-03 17:05:30"
		];
	}
}
