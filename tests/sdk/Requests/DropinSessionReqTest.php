<?php

use EasyTransac\Core\CurlCaller;
use EasyTransac\Core\Services;
use EasyTransac\Entities\DropinSession;
use EasyTransac\Responses\StandardResponse;
use PHPUnit\Framework\TestCase;

class DropinSessionReqTest extends TestCase
{
    public function testExecuteSuccessWithUppercaseSessionToken()
    {
        $mockCaller = $this->getMockBuilder(CurlCaller::class)->getMock();

        $result = [
            'SESSION_TOKEN' => 'sess_test_uppercase',
            'RequestId' => 'req_uppercase',
            'Status' => 'pending',
            'Amount' => 1000,
            'Currency' => 'EUR',
            'ReturnUrl' => 'https://merchant.test/return',
            'NotificationUrl' => 'https://merchant.test/notify',
        ];
        $signature = \EasyTransac\Core\Security::getSignature((object) $result, 'abc');

        $mockCaller->expects($this->once())
            ->method('call')
            ->with(
                $this->equalTo('https://merchant.test/api/dropin/session'),
                $this->callback(function ($params) {
                    return is_array($params)
                        && isset($params['Version'], $params['Signature'])
                        && $params['Version'] === 'easytransac-sdk-php';
                })
            )
            ->willReturn(json_encode([
                'Code' => 0,
                'Signature' => $signature,
                'Result' => $result,
            ]));

        $this->configureServices($mockCaller);

        $request = new \EasyTransac\Requests\DropinSession();
        $entity = new \EasyTransac\Entities\DropinSessionTransaction();
        $response = $request->execute($entity);

        $this->assertTrue($response instanceof StandardResponse);
        $this->assertTrue($response->isSuccess());
        $this->assertTrue($response->getContent() instanceof DropinSession);
        $this->assertEquals('sess_test_uppercase', $response->getContent()->getToken());
        $this->assertEquals('sess_test_uppercase', $response->getContent()->getSessionToken());
        $this->assertEquals('sess_test_uppercase', $response->getContent()->getUppercaseSessionToken());
        $this->assertEquals('req_uppercase', $response->getContent()->getRequestId());
    }

    public function testExecuteSuccessWithSessionToken()
    {
        $mockCaller = $this->getMockBuilder(CurlCaller::class)->getMock();

        $result = [
            'SessionToken' => 'sess_test_123',
            'RequestId' => 'req_123',
            'Status' => 'pending',
            'Amount' => 1000,
            'Currency' => 'EUR',
            'ReturnUrl' => 'https://merchant.test/return',
            'NotificationUrl' => 'https://merchant.test/notify',
        ];
        $signature = \EasyTransac\Core\Security::getSignature((object) $result, 'abc');

        $mockCaller->expects($this->once())
            ->method('call')
            ->willReturn(json_encode([
                'Code' => 0,
                'Signature' => $signature,
                'Result' => $result,
            ]));

        $this->configureServices($mockCaller);

        $request = new \EasyTransac\Requests\DropinSession();
        $entity = new \EasyTransac\Entities\DropinSessionTransaction();
        $response = $request->execute($entity);

        $this->assertTrue($response instanceof StandardResponse);
        $this->assertTrue($response->isSuccess());
        $this->assertTrue($response->getContent() instanceof DropinSession);
        $this->assertEquals('sess_test_123', $response->getContent()->getToken());
        $this->assertEquals('req_123', $response->getContent()->getRequestId());
    }

    public function testExecuteSuccessWithTokenFallback()
    {
        $mockCaller = $this->getMockBuilder(CurlCaller::class)->getMock();

        $result = [
            'Token' => 'sess_test_fallback',
            'RequestId' => 'req_456',
            'Status' => 'pending',
        ];
        $signature = \EasyTransac\Core\Security::getSignature((object) $result, 'abc');

        $mockCaller->expects($this->once())
            ->method('call')
            ->willReturn(json_encode([
                'Code' => 0,
                'Signature' => $signature,
                'Result' => $result,
            ]));

        $this->configureServices($mockCaller);

        $request = new \EasyTransac\Requests\DropinSession();
        $entity = new \EasyTransac\Entities\DropinSessionTransaction();
        $response = $request->execute($entity);

        $this->assertTrue($response instanceof StandardResponse);
        $this->assertTrue($response->isSuccess());
        $this->assertEquals('sess_test_fallback', $response->getContent()->getToken());
        $this->assertEquals('sess_test_fallback', $response->getContent()->getSessionToken());
        $this->assertEquals('sess_test_fallback', $response->getContent()->getRawToken());
    }

    public function testExecuteFailsWhenTokenIsMissing()
    {
        $mockCaller = $this->getMockBuilder(CurlCaller::class)->getMock();

        $result = [
            'RequestId' => 'req_missing',
            'Status' => 'pending',
        ];
        $signature = \EasyTransac\Core\Security::getSignature((object) $result, 'abc');

        $mockCaller->expects($this->once())
            ->method('call')
            ->willReturn(json_encode([
                'Code' => 0,
                'Signature' => $signature,
                'Result' => $result,
            ]));

        $this->configureServices($mockCaller);

        $request = new \EasyTransac\Requests\DropinSession();
        $entity = new \EasyTransac\Entities\DropinSessionTransaction();
        $response = $request->execute($entity);

        $this->assertTrue($response instanceof StandardResponse);
        $this->assertFalse($response->isSuccess());
        $this->assertEquals('Missing session token in Drop-in response', $response->getErrorMessage());
    }

    public function testExecuteJsonFailed()
    {
        $mockCaller = $this->getMockBuilder(CurlCaller::class)->getMock();

        $mockCaller->expects($this->once())
            ->method('call')
            ->willReturn('');

        $this->configureServices($mockCaller);

        $request = new \EasyTransac\Requests\DropinSession();
        $entity = new \EasyTransac\Entities\DropinSessionTransaction();
        $response = $request->execute($entity);

        $this->assertTrue($response instanceof StandardResponse);
        $this->assertFalse($response->isSuccess());
        $this->assertNotEmpty($response->getErrorMessage());
    }

    private function configureServices($mockCaller)
    {
        Services::getInstance()->setCaller($mockCaller);
        Services::getInstance()->removeModifier();
        Services::getInstance()->provideAPIKey('abc');
        Services::getInstance()->setUrl('https://merchant.test/api');
    }
}
