<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class LoggerTest extends PHPUnit_Framework_TestCase
{
	public function testGetInstance()
	{
		$this->assertTrue(\EasyTransac\Core\Logger::getInstance() instanceof \EasyTransac\Core\Logger);
	}
	
	public function testActive()
	{
		\EasyTransac\Core\Logger::getInstance()->setActive(true);
		$this->assertTrue(\EasyTransac\Core\Logger::getInstance()->isActive());

		\EasyTransac\Core\Logger::getInstance()->setActive(false);
		$this->assertFalse(\EasyTransac\Core\Logger::getInstance()->isActive());
	}
	
	public function testFilepath()
	{
		\EasyTransac\Core\Logger::getInstance()->setFilePath('/test/my/path/');
		$this->assertEquals(\EasyTransac\Core\Logger::getInstance()->getFilePath(), '/test/my/path/');
	}
	
	public function testWrite()
	{
		\EasyTransac\Core\Logger::getInstance()->setActive(false);
		$value = \EasyTransac\Core\Logger::getInstance()->write('test');
		$this->assertEquals($value, null);
		
		\EasyTransac\Core\Logger::getInstance()->setActive(true);
		\EasyTransac\Core\Logger::getInstance()->setFilePath(__DIR__.DIRECTORY_SEPARATOR);
		$value = \EasyTransac\Core\Logger::getInstance()->write('test');
		$this->assertEquals($value, \EasyTransac\Core\Logger::getInstance());
		$this->assertTrue(file_exists(__DIR__.DIRECTORY_SEPARATOR.'easytransac-sdk.txt'));
		
		\EasyTransac\Core\Logger::getInstance()->delete();
		$this->assertFalse(file_exists(__DIR__.DIRECTORY_SEPARATOR.'easytransac-sdk.txt'));
	}
	
	public static function tearDownAfterClass()
	{
		\EasyTransac\Core\Logger::getInstance()->setActive(false);
	}
}

?>