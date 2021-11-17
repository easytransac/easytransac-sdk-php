<?php

use EasyTransac\Core\CurlCaller;
use EasyTransac\Core\Services;
use EasyTransac\Entities\PaymentCapture;
use EasyTransac\Requests\Capture;
use EasyTransac\Responses\StandardResponse;
use PHPUnit\Framework\TestCase;

class CaptureTest extends TestCase
{
    public function testExecuteSuccess()
    {
        $result = [
            'Tid' => 'a1b2c3d4',
            'Status' => 'captured',
            'Date' => '2019-05-23 11:44:05',
            'Amount' => '29.99',
            'FixFees' => '0.01',
            'Message' => 'Transaction refunded',
            '3DSecure' => 'yes',
            'OneClick' => 'no',
            'Alias' => 'a1b2c3d4',
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

        $request = new Capture();
        $entity = new PaymentCapture();
        $response = $request->execute($entity);

        $this->assertTrue($response instanceof StandardResponse);
        $this->assertTrue($response->isSuccess());
        $this->assertTrue($response->getContent() instanceof PaymentCapture);
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

        $request = new Capture();
        $entity = new PaymentCapture();
        $response = $request->execute($entity);

        $this->assertTrue($response instanceof StandardResponse);
        $this->assertFalse($response->isSuccess());
        $this->assertNotEmpty($response->getErrorMessage());
    }
}
