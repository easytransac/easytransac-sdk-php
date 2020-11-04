<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class BooleanToStringTest extends PHPUnit_Framework_TestCase
{
	public function testConvert()
	{
		$converter = new \EasyTransac\Converters\BooleanToString();

		$this->assertEquals($converter->convert(true), 'yes');
		$this->assertEquals($converter->convert(false), 'no');
		$this->assertEquals($converter->convert('test'), 'test');
		$this->assertEquals($converter->convert(123), 123);
		$this->assertEquals($converter->convert(0), 0);
		$this->assertEquals($converter->convert(1), 1);
		$this->assertEquals($converter->convert('0'), '0');
		$this->assertEquals($converter->convert('1'), '1');
	}
}

?>
