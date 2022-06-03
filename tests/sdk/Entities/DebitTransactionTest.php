<?php

use PHPUnit\Framework\TestCase;

class DebitTransactionTest extends TestCase
{
    public function testToArray()
    {
        $c = new EasyTransac\Entities\DebitTransaction();
        $f = $this->getFixture();

        $customer = new EasyTransac\Entities\Customer();
        $customer->setLastname($f['Customer']['Lastname']);

        $c->setAmount($f['Amount']);
        $c->setClientIp($f['ClientIp']);
        $c->setCustomer($customer);
        $c->setDescription($f['Description']);
        $c->setDownPayment($f['DownPayment']);
        $c->setMultiplePayments($f['MultiplePayments']);
        $c->setOrderId($f['OrderId']);
        $c->setB2B($f['B2B']);
        $c->setUserAgent($f['UserAgent']);
        $c->setLanguage($f['Language']);
        $c->setPayToEmail($f['PayToEmail']);
        $c->setPayToId($f['PayToId']);
        $c->setRecurrence($f['Recurrence']);
        $c->setRebill($f['Rebill']);
        $c->setMultiplePaymentsRepeat($f['MultiplePaymentsRepeat']);
        $c->setIban($f['Iban']);
        $c->setBic($f['Bic']);

        $this->assertEquals($c->toArray(), $this->getFixture(true));

        $customer = new EasyTransac\Entities\DebitTransaction();
        $customer->setAccountOwner('a');
        $customer->setSddCallingCode('b');
        $customer->setSddPhone('c');
        $customer->setReturnUrl('d');
        $r = $customer->toArray();

        $this->assertEquals('a', $r['AccountOwner']);
        $this->assertEquals('b', $r['SddCallingCode']);
        $this->assertEquals('c', $r['SddPhone']);
        $this->assertEquals('d', $r['ReturnUrl']);
    }

    public function testHydrate()
    {
        $c = new EasyTransac\Entities\DebitTransaction();
        $c->hydrate(json_decode(json_encode($this->getFixture())));

        $this->assertEquals($c->toArray(), $this->getFixture(true));
    }

    public function getFixture($rendered = false)
    {
        if (!$rendered) {
            return [
                'Amount' => 12300,
                'OrderId' => 10,
                'Description' => 'Description of the transaction',
                'ClientIp' => '127.0.0.1',
                'B2B' => 'no',
                'DownPayment' => 3500,
                'MultiplePayments' => 3,
                'MultiplePaymentsRepeat' => 3,
                'Customer' => [
                    'Lastname' => 'Doe'
                ],
                'Rebill' => 'yes',
                'Recurrence' => 'monthly',
                'PayToEmail' => 'test@test.com',
                'PayToId' => 123,
                'UserAgent' => 'ua',
                'Language' => 'FRE',
                'Bic' => 'abc',
                'Iban' => 'abcde',
            ];
        } else {
            return [
                'Amount' => 12300,
                'OrderId' => 10,
                'Description' => 'Description of the transaction',
                'ClientIp' => '127.0.0.1',
                'B2B' => 'no',
                'DownPayment' => 3500,
                'MultiplePayments' => 3,
                'MultiplePaymentsRepeat' => 3,
                'Lastname' => 'Doe',
                'Rebill' => 'yes',
                'Recurrence' => 'monthly',
                'PayToEmail' => 'test@test.com',
                'PayToId' => 123,
                'UserAgent' => 'ua',
                'Language' => 'FRE',
                'Bic' => 'abc',
                'Iban' => 'abcde',
            ];
        }
    }
}
