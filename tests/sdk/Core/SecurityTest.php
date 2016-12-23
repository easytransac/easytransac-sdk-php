<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class SecurityTest extends PHPUnit_Framework_TestCase
{
	public function testGetSignature()
	{
		$sign = \EasyTransac\Core\Security::getSignature([
			'arg1' => 'abc',
			'arg2' => 'bcd',
			'arg3' => 'cde',
			'arg4' => ['arg4.1' => 'abc'],
			'arg5' => ['arg5.1' => 'abc'],
		], 'abcd');
		
		$this->assertEquals($sign, '75822e279f8b9f9902b76672921356361f055e00');
	}
}

?>