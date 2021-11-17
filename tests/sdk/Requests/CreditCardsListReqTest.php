<?php

use EasyTransac\Core\Services;
use EasyTransac\Entities\Customer;
use EasyTransac\Requests\CreditCardsList;
use EasyTransac\Responses\StandardResponse;
use PHPUnit\Framework\TestCase;

class CreditCardsListReqTest extends TestCase
{
    public function testExecuteSuccess()
    {
        $mockCaller = $this->getMockBuilder(\EasyTransac\Core\CurlCaller::class)->getMock();

        $mockCaller->expects($this->once())
            ->method('call')
            ->willReturn('{"Code":0,"Signature":"a5ac24b84a0d13b4199ecbd084bcb54a6351400f","Result":[{"Alias":"a1b2c3d4","CardNumber":"4234********4321","CardMonth":"09","CardYear":"2020","CardType":"visa","CardCountry":"FRA","LastAccessed":"2015-11-2617:26:25"}]}');

        Services::getInstance()->setCaller($mockCaller);
        Services::getInstance()->removeModifier();
        Services::getInstance()->provideAPIKey('abc');

        $request = new CreditCardsList();
        $entity = new Customer();
        $response = $request->execute($entity);

        $this->assertTrue($response instanceof StandardResponse);
        $this->assertTrue($response->isSuccess());
        $this->assertTrue($response->getContent() instanceof \EasyTransac\Entities\CreditCardsList);
        $this->assertTrue(count($response->getContent()->toArray()) > 0);
    }

    public function testExecuteJsonFailed()
    {
        $mockCaller = $this->getMockBuilder(\EasyTransac\Core\CurlCaller::class)->getMock();

        $mockCaller->expects($this->once())
            ->method('call')
            ->willReturn('');

        Services::getInstance()->setCaller($mockCaller);
        Services::getInstance()->removeModifier();
        Services::getInstance()->provideAPIKey('abc');

        $request = new CreditCardsList();
        $entity = new Customer();
        $response = $request->execute($entity);

        $this->assertTrue($response instanceof StandardResponse);
        $this->assertFalse($response->isSuccess());
        $this->assertNotEmpty($response->getErrorMessage());
    }

    public function testExecuteCode0()
    {
        $mockCaller = $this->getMockBuilder(\EasyTransac\Core\CurlCaller::class)->getMock();

        $mockCaller->expects($this->once())
            ->method('call')
            ->willReturn('{"Code":123,"Error":"bad request","Signature":"a9993e364706816aba3e25717850c26c9cd0d89d"}');

        Services::getInstance()->setCaller($mockCaller);
        Services::getInstance()->removeModifier();
        Services::getInstance()->provideAPIKey('abc');

        $request = new CreditCardsList();
        $entity = new Customer();
        $response = $request->execute($entity);

        $this->assertTrue($response instanceof StandardResponse);
        $this->assertFalse($response->isSuccess());
        $this->assertNotEmpty($response->getErrorMessage());
        $this->assertEquals(123, $response->getErrorCode());
    }
}
