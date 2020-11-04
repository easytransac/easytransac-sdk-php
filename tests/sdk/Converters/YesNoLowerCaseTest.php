<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class YesNoLowerCaseTest extends PHPUnit_Framework_TestCase
{
	public function testConvert()
	{
		$converter = new \EasyTransac\Converters\YesNoLowerCase();

		$this->assertEquals($converter->convert('Yes'), 'yes');
		$this->assertEquals($converter->convert('No'), 'no');
		$this->assertEquals($converter->convert('no'), 'no');
		$this->assertEquals($converter->convert('yes'), 'yes');
		$this->assertEquals($converter->convert('Test'), 'Test');
	}
}

?>
