<?php

use EasyTransac\Core\CurlCaller;
use EasyTransac\Core\Services;
use EasyTransac\Entities\CreditCard;
use EasyTransac\Requests\CreditCardInfo;
use EasyTransac\Responses\StandardResponse;
use PHPUnit\Framework\TestCase;

class CreditCardInfoRequestTest extends TestCase
{
    public function testExecuteSuccess()
    {
        $result = [
            'CardBIN' => '411111',
            'CardCountry' => 'USA',
            'CardType' => 'AMEX',
            'CardBank' => 'BANK OF HAWAII',
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

        $request = new CreditCardInfo();
        $entity = new CreditCard();
        $response = $request->execute($entity);

        $this->assertTrue($response instanceof StandardResponse);
        $this->assertTrue($response->isSuccess());
        $this->assertTrue($response->getContent() instanceof \EasyTransac\Entities\CreditCardInfo);
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

        $request = new CreditCardInfo();
        $entity = new CreditCard();
        $response = $request->execute($entity);

        $this->assertTrue($response instanceof StandardResponse);
        $this->assertFalse($response->isSuccess());
        $this->assertNotEmpty($response->getErrorMessage());
    }
}
