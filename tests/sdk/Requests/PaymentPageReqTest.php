<?php

use EasyTransac\Core\CurlCaller;
use EasyTransac\Core\Services;
use EasyTransac\Entities\PaymentPageInfos;
use EasyTransac\Responses\StandardResponse;
use PHPUnit\Framework\TestCase;

class PaymentPageReqTest extends TestCase
{
    public function testExecuteSuccess()
    {
        $mockCaller = $this->getMockBuilder(CurlCaller::class)->getMock();

        $mockCaller->expects($this->once())
            ->method('call')
            ->willReturn('{"Code":0,"Signature":"8f3a03000b77e723f6b124b9eb7b78ee0dcfeab9","Result":{"RequestId":"a1b2c3d4e5f6","Status":"pending","Date":"2015-11-2616:12:01","Amount":"29.99","FixFees":"0.01","3DSecure":"yes","PageUrl":"https://www.easytransac.com/pay/a1b2c3d4e5f6","MailSent":"yes","Email":"john@doe.com","Language":"FRE"}}');

        Services::getInstance()->setCaller($mockCaller);
        Services::getInstance()->removeModifier();
        Services::getInstance()->provideAPIKey('abc');

        $request = new \EasyTransac\Requests\PaymentPage();
        $entity = new \EasyTransac\Entities\PaymentPageTransaction();
        $response = $request->execute($entity);

        $this->assertTrue($response instanceof StandardResponse);
        $this->assertTrue($response->isSuccess());
        $this->assertTrue($response->getContent() instanceof PaymentPageInfos);
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

        $request = new \EasyTransac\Requests\PaymentPage();
        $entity = new \EasyTransac\Entities\PaymentPageTransaction();
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

        $request = new \EasyTransac\Requests\PaymentPage();
        $entity = new \EasyTransac\Entities\PaymentPageTransaction();
        $response = $request->execute($entity);

        $this->assertTrue($response instanceof StandardResponse);
        $this->assertFalse($response->isSuccess());
        $this->assertNotEmpty($response->getErrorMessage());
        $this->assertEquals(123, $response->getErrorCode());
    }
}
