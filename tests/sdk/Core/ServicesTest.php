<?php

use EasyTransac\Core\CurlCaller;
use EasyTransac\Core\Services;
use PHPUnit\Framework\TestCase;

class ServicesTest extends TestCase
{
    public function testGetInstance()
    {
        $this->assertTrue(Services::getInstance() instanceof Services);
    }

    public function testCaller()
    {
        $caller = new CurlCaller();
        Services::getInstance()->setCaller($caller);
        $this->assertEquals(Services::getInstance()->getCaller(), $caller);
    }

    public function testDebug()
    {
        Services::getInstance()->setDebug(true);
        $this->assertTrue(Services::getInstance()->isDebug());

        Services::getInstance()->setDebug(false);
        $this->assertFalse(Services::getInstance()->isDebug());
    }

    public function testCallExceptionApiKey()
    {
        $this->expectException(\RuntimeException::class);
        $args = [];
        Services::getInstance()->provideAPIKey(null);
        Services::getInstance()->call('test', $args);
    }

    public function testCallExceptionCaller()
    {
        $this->expectException(\RuntimeException::class);
        Services::getInstance()->provideAPIKey('test');
        Services::getInstance()->removeCaller();
        $args = [];
        Services::getInstance()->call('test', $args);
    }

    public function testCallWithoutModifier()
    {
        $mockCaller = $this->getMockBuilder(CurlCaller::class)->getMock();

        $mockCaller->expects($this->once())
            ->method('call')
            ->willReturn('{"Code":0}');

        Services::getInstance()->setCaller($mockCaller);
        Services::getInstance()->provideAPIKey('test');
        Services::getInstance()->removeModifier();

        $args = [];
        $response = Services::getInstance()->call('test', $args);
        $this->assertEquals($response, '{"Code":0}');
    }

    public function testCallExceptionCallerCall()
    {
        $mockCaller = $this->getMockBuilder(CurlCaller::class)->getMock();

        $mockCaller->expects($this->once())
            ->method('call')
            ->will($this->throwException(new RuntimeException('Caller::call failed')));

        Services::getInstance()->setCaller($mockCaller);
        Services::getInstance()->provideAPIKey('test');
        Services::getInstance()->removeModifier();

        $this->expectException(\RuntimeException::class);
        $args = [];
        Services::getInstance()->call('test', $args);
    }
}
