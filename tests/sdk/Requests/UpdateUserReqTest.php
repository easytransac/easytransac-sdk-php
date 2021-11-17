<?php

use EasyTransac\Core\CurlCaller;
use EasyTransac\Core\Services;
use EasyTransac\Entities\User;
use EasyTransac\Responses\StandardResponse;
use PHPUnit\Framework\TestCase;

class UpdateUserReqTest extends TestCase
{
    public function testExecuteSuccess()
    {
        $mockCaller = $this->getMockBuilder(CurlCaller::class)
            ->setMethods(['call'])
            ->getMock();

        $mockCaller->expects($this->once())
            ->method('call')
            ->willReturn('{"Code":0,"Signature":"2d973ec5dcf1c2f3aff81ad447e06a74bd6b33af","Result":{"Id":"28861561","Message":"Userjohn@doe.comupdated"}}');

        Services::getInstance()->setCaller($mockCaller);
        Services::getInstance()->removeModifier();
        Services::getInstance()->provideAPIKey('abc');

        $request = new \EasyTransac\Requests\UpdateUser();
        $entity = new User();
        $response = $request->execute($entity);

        $this->assertTrue($response instanceof StandardResponse);
        $this->assertTrue($response->isSuccess());
        $this->assertTrue($response->getContent() instanceof User);
        $this->assertTrue(count($response->getContent()->toArray()) > 0);
    }

    public function testExecuteJsonFailed()
    {
        $mockCaller = $this->getMockBuilder(CurlCaller::class)->getMock();

        $mockCaller->expects($this->once())
            ->method('call')
            ->willReturn('');

        Services::getInstance()->setCaller($mockCaller);
        Services::getInstance()->removeModifier();
        Services::getInstance()->provideAPIKey('abc');

        $request = new \EasyTransac\Requests\UpdateUser();
        $entity = new User();
        $response = $request->execute($entity);

        $this->assertTrue($response instanceof StandardResponse);
        $this->assertFalse($response->isSuccess());
        $this->assertNotEmpty($response->getErrorMessage());
    }

    public function testExecuteCode0()
    {
        $mockCaller = $this->getMockBuilder(CurlCaller::class)->getMock();

        $mockCaller->expects($this->once())
            ->method('call')
            ->willReturn('{"Code":123,"Error":"bad request","Signature":"a9993e364706816aba3e25717850c26c9cd0d89d"}');

        Services::getInstance()->setCaller($mockCaller);
        Services::getInstance()->removeModifier();
        Services::getInstance()->provideAPIKey('abc');

        $request = new \EasyTransac\Requests\UpdateUser();
        $entity = new User();
        $response = $request->execute($entity);

        $this->assertTrue($response instanceof StandardResponse);
        $this->assertFalse($response->isSuccess());
        $this->assertNotEmpty($response->getErrorMessage());
        $this->assertEquals(123, $response->getErrorCode());
    }
}
