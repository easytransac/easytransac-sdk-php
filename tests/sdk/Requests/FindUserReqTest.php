<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class FindUserReqTest extends PHPUnit_Framework_TestCase
{
	public function testExecuteSuccess()
	{
		$mockCaller = $this->getMockBuilder(\EasyTransac\Core\CurlCaller::class)
			->setMethods(['call'])
			->getMock();
		
		$mockCaller->expects($this->once())
			->method('call')
			->willReturn('{"Code":0,"Result":{"Id":"1232545","Email":"john@doe.com","JoinDate":"2015-09-1014:30:27","Balance":"0.00","ConditionsAccepted":"yes","Active":"yes","Tester":"no","Firstname":"John","Lastname":"DOE","CallingCode":"33","Phone":"0666554411","BirthDate":"1990-01-02","Company":"IBMStrasbourg","CompanyLogo":"https://www.easytransac.com/showlogo/xxx","AccountOwner":"JohnDoe","Iban":"FR1420041010050500013M02606","Bic":"CEPAFRPP118","Vat":null,"Siret":null,"Address":"32placedeLyon","ZipCode":"75000","City":"PARIS","Nationality":"FRA","Identifier":null},"Signature":"051bbdc936e19714283bee8ca26b498451360219"}');
			
		\EasyTransac\Core\Services::getInstance()->setCaller($mockCaller);
		\EasyTransac\Core\Services::getInstance()->removeModifier();
		\EasyTransac\Core\Services::getInstance()->provideAPIKey('abc');
		
		$request = new \EasyTransac\Requests\FindUser();
		$entity = new \EasyTransac\Entities\FindUserBy();
		$response = $request->execute($entity);
		
		$this->assertTrue($response instanceof \EasyTransac\Responses\StandardResponse);
		$this->assertTrue($response->isSuccess());
		$this->assertTrue($response->getContent() instanceof \EasyTransac\Entities\User);
		$this->assertTrue(!empty($response->getContent()->toArray()));
	}

	public function testExecuteSignatureFailed()
	{
		$mockCaller = $this->getMockBuilder(\EasyTransac\Core\CurlCaller::class)
			->setMethods(['call'])
			->getMock();
		
		$mockCaller->expects($this->once())
			->method('call')
			->willReturn('{"Code":0,"Result":{"Id":"1232545","Email":"john@doe.com","JoinDate":"2015-09-1014:30:27","Balance":"0.00","ConditionsAccepted":"yes","Active":"yes","Tester":"no","Firstname":"John","Lastname":"DOE","CallingCode":"33","Phone":"0666554411","BirthDate":"1990-01-02","Company":"IBMStrasbourg","CompanyLogo":"https://www.easytransac.com/showlogo/xxx","AccountOwner":"JohnDoe","Iban":"FR1420041010050500013M02606","Bic":"CEPAFRPP118","Vat":null,"Siret":null,"Address":"32placedeLyon","ZipCode":"75000","City":"PARIS","Nationality":"FRA","Identifier":null},"Signature":"051bbdc936e19714283bee8ca26b4984513602aa"}');
			
		\EasyTransac\Core\Services::getInstance()->setCaller($mockCaller);
		\EasyTransac\Core\Services::getInstance()->removeModifier();
		\EasyTransac\Core\Services::getInstance()->provideAPIKey('abc');
		
		$request = new \EasyTransac\Requests\FindUser();
		$entity = new \EasyTransac\Entities\FindUserBy();
		$response = $request->execute($entity);
		
		$this->assertTrue($response instanceof \EasyTransac\Responses\StandardResponse);
		$this->assertFalse($response->isSuccess());
		$this->assertEquals($response->getErrorMessage(), "The signature is incorrect");
	}

	public function testExecuteSignatureMissingParameter()
	{
		$mockCaller = $this->getMockBuilder(\EasyTransac\Core\CurlCaller::class)
			->setMethods(['call'])
			->getMock();
		
		$mockCaller->expects($this->once())
			->method('call')
			->willReturn('{"Code":0,"Result":{"Id":"1232545","JoinDate":"2015-09-1014:30:27","Balance":"0.00","ConditionsAccepted":"yes","Active":"yes","Tester":"no","Firstname":"John","Lastname":"DOE","CallingCode":"33","Phone":"0666554411","BirthDate":"1990-01-02","Company":"IBMStrasbourg","CompanyLogo":"https://www.easytransac.com/showlogo/xxx","AccountOwner":"JohnDoe","Iban":"FR1420041010050500013M02606","Bic":"CEPAFRPP118","Vat":null,"Siret":null,"Address":"32placedeLyon","ZipCode":"75000","City":"PARIS","Nationality":"FRA","Identifier":null},"Signature":"03b40e5c1879a16e9017b2333ac372ea64f614a2"}');
			
		\EasyTransac\Core\Services::getInstance()->setCaller($mockCaller);
		\EasyTransac\Core\Services::getInstance()->removeModifier();
		\EasyTransac\Core\Services::getInstance()->provideAPIKey('abc');
		
		$request = new \EasyTransac\Requests\FindUser();
		$entity = new \EasyTransac\Entities\FindUserBy();
		$response = $request->execute($entity);
		
		$this->assertTrue($response instanceof \EasyTransac\Responses\StandardResponse);
		$this->assertFalse($response->isSuccess());
		
		$this->assertEquals($response->getErrorMessage(), "One or more required fields in the response are missing");
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
	
		$request = new \EasyTransac\Requests\FindUser();
		$entity = new \EasyTransac\Entities\FindUserBy();
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
			->willReturn('{"Code":123,"Error":"bad request","Signature":"a9993e364706816aba3e25717850c26c9cd0d89d"}');
	
		\EasyTransac\Core\Services::getInstance()->setCaller($mockCaller);
		\EasyTransac\Core\Services::getInstance()->removeModifier();
		\EasyTransac\Core\Services::getInstance()->provideAPIKey('abc');
	
		$request = new \EasyTransac\Requests\FindUser();
		$entity = new \EasyTransac\Entities\FindUserBy();
		$response = $request->execute($entity);
	
		$this->assertTrue($response instanceof \EasyTransac\Responses\StandardResponse);
		$this->assertFalse($response->isSuccess());
		$this->assertNotEmpty($response->getErrorMessage());
		$this->assertEquals($response->getErrorCode(), 123);
	}
}

?>