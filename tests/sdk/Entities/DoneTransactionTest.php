<?php

use PHPUnit\Framework\TestCase;

class DoneTransactionTest extends TestCase
{
    public function testHydrate()
    {
        $f = $this->getFixture(true, true);
        $c = new EasyTransac\Entities\DoneTransaction();
        $c->hydrate(json_decode(json_encode($this->getFixture(false, true))));

        $this->assertEquals($c->toArray(), $f);

        $this->assertEquals($c->getAlias(), $f['Alias']);
        $this->assertEquals($c->getSecureUrl(), $f['3DSecureUrl']);
        $this->assertEquals($c->getAmount(), $f['Amount']);
        $this->assertEquals($c->getSecure(), $f['3DSecure']);
        $this->assertEquals($c->getDate(), $f['Date']);
        $this->assertEquals($c->getFixFees(), $f['FixFees']);
        $this->assertEquals($c->getMessage(), $f['Message']);
        $this->assertEquals($c->getMultiplePayments(), $f['MultiplePayments']);
        $this->assertEquals($c->getOneClick(), $f['OneClick']);
        $this->assertEquals($c->getOrderId(), $f['OrderId']);
        $this->assertEquals($c->getOriginalPaymentTid(), $f['OriginalPaymentTid']);
        $this->assertEquals($c->getRebill(), $f['Rebill']);
        $this->assertEquals($c->getRequestId(), $f['RequestId']);
        $this->assertEquals($c->getStatus(), $f['Status']);
        $this->assertEquals($c->getTid(), $f['Tid']);
        $this->assertEquals($c->getUid(), $f['Uid']);
        $this->assertEquals($c->getMandateUrl(), $f['MandateUrl']);
        $this->assertTrue($c->isCaptured());

        $c = new EasyTransac\Entities\DoneTransaction();
        $c->hydrate(json_decode(json_encode([
            'RequestAttempt' => 'a',
            'OriginalRequestId' => 'b',
            'OperationType' => 'c',
            'AmountRefund' => 'd',
            'RedirectUrl' => 'e',
            'Test' => 'f',
            'Client' => new EasyTransac\Entities\Client()
        ])));
        $this->assertEquals('a', $c->getRequestAttempt());
        $this->assertEquals('b', $c->getOriginalRequestId());
        $this->assertEquals('c', $c->getOperationType());
        $this->assertEquals('d', $c->getAMountRefund());
        $this->assertEquals('e', $c->getRedirectUrl());
        $this->assertEquals('f', $c->getTest());
        $this->assertTrue($c->getClient() instanceof EasyTransac\Entities\Client);
    }

    protected function getFixture($rendered = false, $full = false): array
    {
        if ($full) {
            if (!$rendered) {
                return [
                    'RequestId' => 123,
                    'Tid' => 234,
                    'Uid' => 345,
                    'OrderId' => 456,
                    'Status' => 'captured',
                    'Date' => '2016-12-06 11:37:00',
                    'DateRefund' => null,
                    'DateChargeback' => null,
                    'DateRepresentment' => null,
                    'Amount' => 12000,
                    'FixFees' => 2000,
                    'Message' => 'Test message',
                    '3DSecure' => 'no',
                    'OneClick' => 'yes',
                    'MultiplePayments' => 'yes',
                    'Rebill' => 'no',
                    'OriginalPaymentTid' => 678,
                    'Alias' => 789,
                    'Error' => 'test',
                    'AdditionalError' => 'test',
                    '3DSecureUrl' => 'test',
                    'MandateUrl' => 'https://myurladdress.com',
                    'Client' => array (
                        'Id' => 'DZxemv4',
                        'Email' => 'john@doe.com',
                        'Firstname' => 'Pitest',
                        'Lastname' => 'BULL',
                        'Phone' => '0388000000',
                        'Address' => '204 av vosges',
                        'ZipCode' => '67100',
                        'City' => 'STRASB'
                    ),
                ];
            } else {
                return [
                    'RequestId' => 123,
                    'Tid' => 234,
                    'Uid' => 345,
                    'OrderId' => 456,
                    'Status' => 'captured',
                    'Date' => '2016-12-06 11:37:00',
                    'Amount' => 12000,
                    'FixFees' => 2000,
                    'Message' => 'Test message',
                    '3DSecure' => 'no',
                    'OneClick' => 'yes',
                    'MultiplePayments' => 'yes',
                    'Rebill' => 'no',
                    'OriginalPaymentTid' => 678,
                    'Alias' => 789,
                    'Error' => 'test',
                    'AdditionalError' => 'test',
                    '3DSecureUrl' => 'test',
                    'Id' => 'DZxemv4',
                    'Email' => 'john@doe.com',
                    'Firstname' => 'Pitest',
                    'Lastname' => 'BULL',
                    'Phone' => '0388000000',
                    'Address' => '204 av vosges',
                    'ZipCode' => '67100',
                    'City' => 'STRASB',
                    'MandateUrl' => 'https://myurladdress.com',
                ];
            }
        } else { // Incomplet (valeurs optionnelles absentes)
            if (!$rendered) {
                return [
                    'DateRefund' => null,
                    'DateChargeback' => null,
                    'DateRepresentment' => null,
                    'Amount' => 12000,
                    'Error' => null,
                    'AdditionalError' => null,
                    'Client' => array (
                        'Id' => 'DZxemv4',
                        'Email' => 'john@doe.com',
                        'Firstname' => 'Pitest',
                        'Lastname' => 'BULL',
                        'Phone' => '0388000000',
                        'Address' => '204 av vosges',
                        'ZipCode' => '67100',
                        'City' => 'STRASB'
                    ),
                ];
            } else {
                return [
                    'Date' => '2016-12-06 11:37:00',
                    'Amount' => 12000,
                    'Id' => 'DZxemv4',
                    'Email' => 'john@doe.com',
                    'Firstname' => 'Pitest',
                    'Lastname' => 'BULL',
                    'Phone' => '0388000000',
                    'Address' => '204 av vosges',
                    'ZipCode' => '67100',
                    'City' => 'STRASB',
                ];
            }
        }
    }
}
