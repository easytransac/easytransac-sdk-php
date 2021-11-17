<?php

use EasyTransac\Core\CurlCaller;
use EasyTransac\Core\Services;
use EasyTransac\Entities\Customer;
use EasyTransac\Responses\StandardResponse;
use PHPUnit\Framework\TestCase;

class UpdateCustomerTest extends TestCase
{
    public function testExecuteSuccess()
    {
        $result = [
            'Id' => '31616321',
            'Email' => 'john@doe.com',
            'KYC' => '2',
            'Firstname' => 'John',
            'Lastname' => 'Doe',
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

        $request = new \EasyTransac\Requests\UpdateCustomer();
        $entity = new Customer();
        $response = $request->execute($entity);

        $this->assertTrue($response instanceof StandardResponse);
        $this->assertTrue($response->isSuccess());
        $this->assertTrue($response->getContent() instanceof Customer);
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

        $request = new \EasyTransac\Requests\UpdateCustomer();
        $entity = new Customer();
        $response = $request->execute($entity);

        $this->assertTrue($response instanceof StandardResponse);
        $this->assertFalse($response->isSuccess());
        $this->assertNotEmpty($response->getErrorMessage());
    }
}
