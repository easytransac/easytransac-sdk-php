<?php

use EasyTransac\Core\Logger;
use PHPUnit\Framework\TestCase;

class LoggerTest extends TestCase
{
    public function testGetInstance()
    {
        $this->assertTrue(Logger::getInstance() instanceof Logger);
    }

    public function testActive()
    {
        Logger::getInstance()->setActive(true);
        $this->assertTrue(Logger::getInstance()->isActive());

        Logger::getInstance()->setActive(false);
        $this->assertFalse(Logger::getInstance()->isActive());
    }

    public function testFilepath()
    {
        Logger::getInstance()->setFilePath('/test/my/path/');
        $this->assertEquals('/test/my/path/', Logger::getInstance()->getFilePath());
    }

    public function testWrite()
    {
        Logger::getInstance()->setActive(false);
        $value = Logger::getInstance()->write('test');
        $this->assertEquals(null, $value);

        Logger::getInstance()->setActive(true);
        Logger::getInstance()->setFilePath(__DIR__ . DIRECTORY_SEPARATOR);
        $value = Logger::getInstance()->write('test');
        $this->assertEquals($value, Logger::getInstance());
        $this->assertTrue(file_exists(__DIR__ . DIRECTORY_SEPARATOR . 'easytransac-sdk.txt'));

        Logger::getInstance()->delete();
        $this->assertFalse(file_exists(__DIR__ . DIRECTORY_SEPARATOR . 'easytransac-sdk.txt'));
    }

    public static function tearDownAfterClass()
    {
        Logger::getInstance()->setActive(false);
    }
}
