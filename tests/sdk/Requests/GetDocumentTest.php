<?php

use EasyTransac\Core\CurlCaller;
use EasyTransac\Core\Services;
use EasyTransac\Entities\Document;
use EasyTransac\Responses\StandardResponse;
use PHPUnit\Framework\TestCase;

class GetDocumentTest extends TestCase
{
    public function testExecuteSuccess()
    {
        $result = [
            'Id' => 'WEX3SJ6B9G',
            'DocumentType' => 'ARTICLES_OF_ASSOCIATION',
            'Status' => 'pending',
            'Date' => '2019-05-23 13:19:05',
            'DateUpdated' => '2019-05-23 13:19:05',
            'Url' => 'https://easytransac.local/showdocument/XXXXXX',
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

        $request = new \EasyTransac\Requests\GetDocument();
        $entity = new \EasyTransac\Entities\DocumentRequest();
        $response = $request->execute($entity);

        $this->assertTrue($response instanceof StandardResponse);
        $this->assertTrue($response->isSuccess());
        $this->assertTrue($response->getContent() instanceof Document);
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

        $request = new \EasyTransac\Requests\GetDocument();
        $entity = new \EasyTransac\Entities\DocumentRequest();
        $response = $request->execute($entity);

        $this->assertTrue($response instanceof StandardResponse);
        $this->assertFalse($response->isSuccess());
        $this->assertNotEmpty($response->getErrorMessage());
    }
}
