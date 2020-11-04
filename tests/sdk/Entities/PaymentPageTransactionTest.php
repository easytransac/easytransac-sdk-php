<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class PaymentPageTransactionTest extends PHPUnit_Framework_TestCase
{
    public function testSettersGetters()
    {
    	$f = $this->getFixture();

    	$cust = new \EasyTransac\Entities\Customer();
    	$cust->setFirstname($f['Customer']['Firstname']);

    	$c = new \EasyTransac\Entities\PaymentPageTransaction();

    	$c->setDownPayment($f['DownPayment']);
    	$c->setPayToEmail($f['PayToEmail']);
    	$c->setRebill($f['Rebill']);
    	$c->setRecurrence($f['Recurrence']);
    	$c->setUserAgent($f['UserAgent']);

    	$this->assertEquals($c->getDownPayment(), $f['DownPayment']);
    	$this->assertEquals($c->getPayToEmail(), $f['PayToEmail']);
    	$this->assertEquals($c->getRebill(), $f['Rebill']);
    	$this->assertEquals($c->getRecurrence(), $f['Recurrence']);
    	$this->assertEquals($c->getUserAgent(), $f['UserAgent']);
    }

    public function testToArray()
    {
    	$f = $this->getFixture();

    	$cust = new \EasyTransac\Entities\Customer();
    	$cust->setFirstname($f['Customer']['Firstname']);

    	$c = new \EasyTransac\Entities\PaymentPageTransaction();

    	$c->setAmount($f['Amount']);
    	$c->setCancelUrl($f['CancelUrl']);
    	$c->setClientIP($f['ClientIP']);
    	$c->setCustomer($cust);
    	$c->setDescription($f['Description']);
    	$c->setDownPayment($f['DownPayment']);
    	$c->setLanguage($f['Language']);
    	$c->setMultiplePayments($f['MultiplePayments']);
    	$c->setMultiplePaymentsRepeat($f['MultiplePaymentsRepeat']);
    	$c->setOrderId($f['OrderId']);
    	$c->setPayToEmail($f['PayToEmail']);
    	$c->setRebill($f['Rebill']);
    	$c->setRecurrence($f['Recurrence']);
    	$c->setReturnUrl($f['ReturnUrl']);
    	$c->setSecure($f['3DS']);
    	$c->setSendEmail($f['SendEmail']);
    	$c->setUserAgent($f['UserAgent']);
    	$c->setSendSMS($f['SendSMS']);
    	$c->setSendLater($f['SendLater']);
    	$c->setOperationType($f['OperationType']);
    	$c->setAskAmount($f['AskAmount']);
    	$c->setAskInvoiceNumber($f['AskInvoiceNumber']);
    	$c->setPreAuth($f['PreAuth']);

    	$this->assertEquals($c->toArray(), $this->getFixture(true));

		$c = new \EasyTransac\Entities\PaymentPageTransaction();
		$c->setPreAuthDuration('a');
		$c->setSddCallingCode('b');
		$c->setSddPhone('c');

		$r = $c->toArray();
		$this->assertEquals($r['PreAuthDuration'], 'a');
		$this->assertEquals($r['SddCallingCode'], 'b');
		$this->assertEquals($r['SddPhone'], 'c');
    }

    public function testHydrate()
    {
    	$c = new \EasyTransac\Entities\PaymentPageTransaction();
    	$c->hydrate(json_decode(json_encode($this->getFixture())));

    	$this->assertEquals($c->toArray(), $this->getFixture(true));
    }

    protected function getFixture($rendered = false)
    {
    	if (!$rendered)
    	{
    		return [
    			'SendEmail' => 'yes',
    			'OrderId' => 123,
    			'Description' => 'Test description',
    			'Amount' => 12000,
   				'ClientIP' => '127.0.0.1',
   				'3DS' => 'no',
    			'ReturnUrl' => 'https:/www.easytransac.com',
    			'CancelUrl' => 'https:/www.easytransac.com',
    			'Customer' => [
    				'Firstname' => 'Mich'
    			],
    			'MultiplePayments' => 'no',
   				'MultiplePaymentsRepeat' => null,
   				'DownPayment' => null,
   				'Rebill' => null,
    			'Recurrence' => null,
    			'PayToEmail' => null,
    			'UserAgent' => null,
    			'Language' => 'FRE',
    			'SendSMS' => 'no',
    			'SendLater' => '2016-05-12',
    			'OperationType' => 'payment',
    			'AskAmount' => 'no',
    			'AskInvoiceNumber' => 'no',
    			'PreAuth' => 'no',
    		];
    	}
    	else
    	{
    		return [
    			'SendEmail' => 'yes',
    			'OrderId' => 123,
    			'Description' => 'Test description',
    			'Amount' => 12000,
   				'ClientIP' => '127.0.0.1',
   				'3DS' => 'no',
   				'ReturnUrl' => 'https:/www.easytransac.com',
    			'CancelUrl' => 'https:/www.easytransac.com',
    			'Firstname' => 'Mich',
   				'MultiplePayments' => 'no',
    			'Language' => 'FRE',
    			'SendSMS' => 'no',
    			'SendLater' => '2016-05-12',
    			'OperationType' => 'payment',
    			'AskAmount' => 'no',
    			'AskInvoiceNumber' => 'no',
    			'PreAuth' => 'no',
    		];
    	}
    }
}

?>
