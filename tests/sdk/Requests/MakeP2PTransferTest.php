<?php

use EasyTransac\Core\CurlCaller;
use EasyTransac\Core\Services;
use EasyTransac\Entities\P2PTransfer;
use EasyTransac\Responses\StandardResponse;
use PHPUnit\Framework\TestCase;

class MakeP2PTransferTest extends TestCase
{
    const API_KEY = 'abc';

    public function testExecuteSuccess()
    {
        $mockCaller = $this->getMockBuilder(CurlCaller::class)->getMock();

        $mockCaller->expects($this->once())
            ->method('call')
            ->willReturn(json_encode([
                'Code' => 0,
                'Signature' => \EasyTransac\Core\Security::getSignature(
                    $this->getFixtureReturn(),
                    self::API_KEY
                ),
                'Result' => $this->getFixtureReturn()
            ]));

        Services::getInstance()->setCaller($mockCaller);
        Services::getInstance()->removeModifier();
        Services::getInstance()->provideAPIKey(self::API_KEY);

        $request = new \EasyTransac\Requests\MakeP2PTransfer();
        $entity = new \EasyTransac\Entities\P2PTransfer();
        $response = $request->execute($entity);

        $this->assertTrue($response instanceof StandardResponse);
        $this->assertTrue($response->isSuccess());
        $this->assertTrue($response->getContent() instanceof P2PTransfer);
    }

    protected function getFixtureReturn()
    {
        return [
            "From" => 1234,
            "To" => 5678,
            "Amount" => 29.99,
            "Status" => "captured",
            "OriginalTid" => "abcd1234",
            "Date" => "2019-06-03 17:05:30"
        ];
    }
}
