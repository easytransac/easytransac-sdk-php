<?php

use EasyTransac\Core\CurlCaller;
use EasyTransac\Core\Services;
use EasyTransac\Entities\DebitTransaction;
use EasyTransac\Entities\DoneTransaction;
use EasyTransac\Requests\DebitPayment;
use EasyTransac\Responses\StandardResponse;
use PHPUnit\Framework\TestCase;

class DebitPaymentReqTest extends TestCase
{
    public function testExecuteSuccess()
    {
        $mockCaller = $this->getMockBuilder(CurlCaller::class)
            ->setMethods(['call'])
            ->getMock();

        $mockCaller->expects($this->once())
            ->method('call')
            ->willReturn('{"Code":0,"Signature":"e4a0529abd0497d87bf94090e88371170a424be6","Result":{"RequestId":"a1b2c3d4e5f6","Tid":"xCww78db","Uid":"Abc123","OrderId":"Cde100","Status":"captured","Date":"2015-11-2616:12:01","DateRefund":"2015-11-2616:12:01","Amount":"29.99","FixFees":"0.01","Message":"Paymentwassuccessful","3DSecure":"no","OneClick":"no","Alias":"a1b2c3d4"}}');

        Services::getInstance()->setCaller($mockCaller);
        Services::getInstance()->removeModifier();
        Services::getInstance()->provideAPIKey('abc');

        $request = new DebitPayment();
        $entity = new DebitTransaction();
        $response = $request->execute($entity);

        $this->assertTrue($response instanceof StandardResponse);
        $this->assertTrue($response->isSuccess());
        $this->assertTrue($response->getContent() instanceof DoneTransaction);
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

        $request = new DebitPayment();
        $entity = new DebitTransaction();
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
            ->willReturn('{"Code":123,"Error":"bad request","Signature":"34419f91e080e64caddc429fde0ac1ac965012fe"}');

        Services::getInstance()->setCaller($mockCaller);
        Services::getInstance()->removeModifier();
        Services::getInstance()->provideAPIKey('abc');

        $request = new DebitPayment();
        $entity = new DebitTransaction();
        $response = $request->execute($entity);

        $this->assertTrue($response instanceof StandardResponse);
        $this->assertFalse($response->isSuccess());
        $this->assertNotEmpty($response->getErrorMessage());
        $this->assertEquals(123, $response->getErrorCode());
    }
}
