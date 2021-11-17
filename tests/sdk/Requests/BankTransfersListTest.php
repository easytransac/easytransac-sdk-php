<?php

use EasyTransac\Core\CurlCaller;
use EasyTransac\Core\Services;
use EasyTransac\Entities\Customer;
use EasyTransac\Requests\BankTransfersList;
use EasyTransac\Responses\StandardResponse;
use PHPUnit\Framework\TestCase;

class BankTransfersListTest extends TestCase
{
    public function testExecuteSuccess()
    {
        $result = [
            [
                'Id' => 'ABCD1234',
                'Date' => '2019-05-23 09:57:51',
                'Status' => 'captured',
                'Amount' => '1234',
                'Iban' => 'FR1420041010050500013M02606',
                'Bic' => 'CEPAFRPP118',
                'Reference' => 'ENTREPRISE',
            ]
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

        $request = new BankTransfersList();
        $entity = new Customer();
        $entity->setEmail('test');
        $response = $request->execute($entity);

        $this->assertTrue($response instanceof StandardResponse);
        $this->assertTrue($response->isSuccess());
        $this->assertTrue($response->getContent() instanceof \EasyTransac\Entities\BankTransfersList);
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

        $request = new BankTransfersList();
        $entity = new Customer();
        $response = $request->execute($entity);

        $this->assertTrue($response instanceof StandardResponse);
        $this->assertFalse($response->isSuccess());
        $this->assertNotEmpty($response->getErrorMessage());
    }
}
