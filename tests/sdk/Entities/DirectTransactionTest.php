<?php

use EasyTransac\Entities\CreditCard;
use EasyTransac\Entities\Customer;
use EasyTransac\Entities\DirectTransaction;
use PHPUnit\Framework\TestCase;

class DirectTransactionTest extends TestCase
{
    public function testToArray()
    {
        $c = new DirectTransaction();
        $f = $this->getFixture();

        $card = new CreditCard();
        $card->setNumber($f['CreditCard']['CardNumber']);

        $customer = new Customer();
        $customer->setLastname($f['Customer']['Lastname']);

        $c->setAmount($f['Amount']);
        $c->setClientIp($f['ClientIp']);
        $c->setCreditCard($card);
        $c->setCustomer($customer);
        $c->setDescription($f['Description']);
        $c->setDownPayment($f['DownPayment']);
        $c->setMultiplePayments($f['MultiplePayments']);
        $c->setOrderId($f['OrderId']);
        $c->setSecure($f['3DS']);
        $c->setUserAgent($f['UserAgent']);
        $c->setLanguage($f['Language']);
        $c->setPayToEmail($f['PayToEmail']);
        $c->setRecurrence($f['Recurrence']);
        $c->setRebill($f['Rebill']);
        $c->setMultiplePaymentsRepeat($f['MultiplePaymentsRepeat']);
        $c->setReturnUrl($f['ReturnUrl']);

        $this->assertEquals($c->toArray(), $this->getFixture(true));

        $c = new DirectTransaction();
        $c->setPreAuth('a');
        $c->setPreAuthDuration('b');
        $r = $c->toArray();
        $this->assertEquals('a', $r['PreAuth']);
        $this->assertEquals('b', $r['PreAuthDuration']);
    }

    public function testHydrate()
    {
        $c = new DirectTransaction();
        $c->hydrate(json_decode(json_encode($this->getFixture())));

        $this->assertEquals($c->toArray(), $this->getFixture(true));
    }

    public function getFixture($rendered = false): array
    {
        if (!$rendered) {
            return [
                'Amount' => 12300,
                'OrderId' => 10,
                'Description' => 'Description of the transaction',
                'ClientIp' => '127.0.0.1',
                '3DS' => 'no',
                'DownPayment' => 3500,
                'MultiplePayments' => 3,
                'MultiplePaymentsRepeat' => 3,
                'Customer' => [
                    'Lastname' => 'Doe'
                ],
                'CreditCard' => [
                    'CardNumber' => '1234567891234567'
                ],
                'Rebill' => 'yes',
                'Recurrence' => 'monthly',
                'PayToEmail' => 'test@test.com',
                'UserAgent' => 'ua',
                'Language' => 'FRE',
                'ReturnUrl' => 'https://toto.com'
            ];
        } else {
            return [
                'Amount' => 12300,
                'OrderId' => 10,
                'Description' => 'Description of the transaction',
                'ClientIp' => '127.0.0.1',
                '3DS' => 'no',
                'DownPayment' => 3500,
                'MultiplePayments' => 3,
                'MultiplePaymentsRepeat' => 3,
                'Lastname' => 'Doe',
                'CardNumber' => '1234567891234567',
                'Rebill' => 'yes',
                'Recurrence' => 'monthly',
                'PayToEmail' => 'test@test.com',
                'UserAgent' => 'ua',
                'Language' => 'FRE',
                'ReturnUrl' => 'https://toto.com'
            ];
        }
    }
}
