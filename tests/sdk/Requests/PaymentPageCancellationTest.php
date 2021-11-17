<?php

use EasyTransac\Core\CurlCaller;
use EasyTransac\Core\Services;
use EasyTransac\Responses\StandardResponse;
use PHPUnit\Framework\TestCase;

class PaymentPageCancellationTest extends TestCase
{
    public function testExecuteSuccess()
    {
        $result = [
            'RequestId' => 'a1b2c3d4e5f6',
            'Status' => 'pending',
            'Date' => '2019-05-23 14:02:05',
            'DateSent' => '2019-05-23 14:02:06',
            'PageUrl' => 'https://easytransac.local/pay/a1b2c3d4e5f6',
            'Email' => 'john@doe.com',
            'Language' => 'FRE',
        ];

        $mockCaller = $this->getMockBuilder(CurlCaller::class)->getMock();

        $mockCaller->expects($this->once())
            ->method('call')
            ->willReturn(json_encode([
                'Code' => 0,
                'Signature' => \EasyTransac\Core\Security::getSignature($result, 'abc'),
                'Result' => $result
            ]));

        Services::getInstance()->setCaller($mockCaller);
        Services::getInstance()->removeModifier();
        Services::getInstance()->provideAPIKey('abc');

        $request = new \EasyTransac\Requests\PaymentPageCancellation();
        $entity = new \EasyTransac\Entities\Cancellation();
        $response = $request->execute($entity);

        $this->assertTrue($response instanceof StandardResponse);
        $this->assertTrue($response->isSuccess());
        $this->assertTrue($response->getContent() instanceof \EasyTransac\Entities\PaymentPageCancellationInfos);
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

        $request = new \EasyTransac\Requests\PaymentPageCancellation();
        $entity = new \EasyTransac\Entities\Cancellation();
        $response = $request->execute($entity);

        $this->assertTrue($response instanceof StandardResponse);
        $this->assertFalse($response->isSuccess());
        $this->assertNotEmpty($response->getErrorMessage());
    }
}
