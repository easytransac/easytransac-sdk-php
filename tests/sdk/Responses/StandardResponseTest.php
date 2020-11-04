<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class StandardResponseTest extends PHPUnit_Framework_TestCase
{
	public function testIsSuccess()
	{
		$c = new \EasyTransac\Responses\StandardResponse();
		$c->setSuccess(true);

		$this->assertTrue($c->isSuccess());
	}

	public function testGetErrorCode()
	{
		$c = new \EasyTransac\Responses\StandardResponse();
		$c->setErrorCode(123);

		$this->assertEquals($c->getErrorCode(), 123);
	}

	public function testGetContent()
	{
		$customer = new \EasyTransac\Entities\Customer();
		$c = new \EasyTransac\Responses\StandardResponse();
		$c->setContent($customer);

		$this->assertEquals($c->getContent(), $customer);
	}

	public function testGetErrorMessage()
	{
		$c = new \EasyTransac\Responses\StandardResponse();
		$c->setErrorMessage('message');

		$this->assertEquals($c->getErrorMessage(), 'message');
	}

	public function testIsSameSignature()
	{
		$c = new \EasyTransac\Responses\StandardResponse();

		$c->setSameSignature(true);
		$this->assertTrue($c->isSameSignature());

		$c->setSameSignature(false);
		$this->assertFalse($c->isSameSignature());
	}

	public function testResponseMisc()
	{
		$c = new \EasyTransac\Responses\StandardResponse(json_decode('{"Code":0,"Signature":"a5ac24b84a0d13b4199ecbd084bcb54a6351400f","Result":{"Alias":"a1b2c3d4","CardNumber":"4234********4321","CardMonth":"09","CardYear":"2020","CardType":"visa","CardCountry":"FRA","LastAccessed":"2015-11-2617:26:25"}}'));
		$this->assertTrue(is_array($c->getRealArrayResponse()));
		$this->assertTrue(is_object($c->getRealJsonResponse()));

		$c = new \EasyTransac\Responses\StandardResponse();
		$this->assertEquals($c->getRealArrayResponse(), null);
	}
}

?>
