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
}

?>