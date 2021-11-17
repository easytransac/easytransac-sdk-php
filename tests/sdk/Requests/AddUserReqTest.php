<?php

use EasyTransac\Core\CurlCaller;
use EasyTransac\Core\Services;
use EasyTransac\Entities\User;
use EasyTransac\Requests\AddUser;
use EasyTransac\Responses\StandardResponse;
use PHPUnit\Framework\TestCase;

class AddUserReqTest extends TestCase
{
    public function testExecuteSuccess()
    {
        $mockCaller = $this->getMockBuilder(CurlCaller::class)
            ->getMock();

        $mockCaller->expects($this->once())
            ->method('call')
            ->willReturn('{"Code":0,"Signature":"8f0c9a3ef3fa2d862497de78ec0a2892005f6802","Result":{"Id":"28861561","Message":"Userjohn@doe.com"}}');

        Services::getInstance()->setCaller($mockCaller);
        Services::getInstance()->removeModifier();
        Services::getInstance()->provideAPIKey('abc');

        $request = new AddUser();
        $entity = new User();
        $response = $request->execute($entity);

        $this->assertTrue($response instanceof StandardResponse);
        $this->assertTrue($response->isSuccess());
        $this->assertTrue($response->getContent() instanceof User);
        $this->assertTrue(!empty($response->getContent()->toArray()));
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

        $request = new AddUser();
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

        $request = new AddUser();
        $entity = new User();
        $response = $request->execute($entity);

        $this->assertTrue($response instanceof StandardResponse);
        $this->assertFalse($response->isSuccess());
        $this->assertNotEmpty($response->getErrorMessage());
        $this->assertEquals(123, $response->getErrorCode());
    }
}
