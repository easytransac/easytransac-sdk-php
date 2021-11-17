<?php

use EasyTransac\Core\PaymentNotification;
use PHPUnit\Framework\TestCase;

class PaymentNotificationTest extends TestCase
{
    public function testGetContent()
    {
        $response = PaymentNotification::getContent($this->getFixture(), 'myApiKey');
        $this->assertEquals($response->toArray(), $this->getFixture(true));
    }

    public function testGetContentFailed()
    {
        $this->expectException(\RuntimeException::class);

        $f = $this->getFixture();
        // we are removing the Tid to expect a signature issue
        unset($f['Tid']);
        PaymentNotification::getContent($f, 'myApiKey');
    }

    protected function getFixture($rendered = false)
    {
        if (!$rendered) {
            return array(
                'OperationType' => 'payment',
                'RequestId' => 'KW5o8AEx98yx',
                'Tid' => '9XLknkv8',
                'Uid' => '2',
                'OrderId' => '72',
                'Status' => 'captured',
                'Date' => '2016-11-30 11:27:46',
                'Amount' => '18.00',
                'Currency' => 'EUR',
                'FixFees' => '0.83',
                'Message' => 'Payment was successful',
                '3DSecure' => 'no',
                'OneClick' => 'no',
                'Alias' => '412J33',
                'CardNumber' => '************0025',
                'Test' => 'yes',
                'Error' => 'Error test',
                'Client' => array(
                    'Id' => 'DZxemv4',
                    'Email' => 'john@doe.com',
                    'Firstname' => 'Pitest',
                    'Lastname' => 'BULL',
                    'Phone' => '0388000000',
                    'Address' => '204 av vosges',
                    'ZipCode' => '67100',
                    'City' => 'STRASB'
                ),
                'Signature' => '7baf77865cd62552fd827bd1da96f576ab36f033'
            );
        } else {
            return array(
                'OperationType' => 'payment',
                'RequestId' => 'KW5o8AEx98yx',
                'Tid' => '9XLknkv8',
                'Uid' => '2',
                'OrderId' => '72',
                'Status' => 'captured',
                'Date' => '2016-11-30 11:27:46',
                'Amount' => '18.00',
                'Currency' => 'EUR',
                'FixFees' => '0.83',
                'Message' => 'Payment was successful',
                '3DSecure' => 'no',
                'OneClick' => 'no',
                'Alias' => '412J33',
                'CardNumber' => '************0025',
                'Test' => 'yes',
                'Id' => 'DZxemv4',
                'Email' => 'john@doe.com',
                'Firstname' => 'Pitest',
                'Lastname' => 'BULL',
                'Phone' => '0388000000',
                'Address' => '204 av vosges',
                'ZipCode' => '67100',
                'City' => 'STRASB',
                'Error' => 'Error test',
                'Signature' => '7baf77865cd62552fd827bd1da96f576ab36f033'
            );
        }
    }
}
