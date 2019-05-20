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
    	$c->setVersion($f['Version']);
    	
    	$this->assertEquals($c->getAmount(), $f['Amount']);
    	$this->assertEquals($c->getCancelUrl(), $f['CancelUrl']);
    	$this->assertEquals($c->getClientIP(), $f['ClientIP']);
    	$this->assertEquals($c->getCustomer(), $cust);
    	$this->assertEquals($c->getDescription(), $f['Description']);
    	$this->assertEquals($c->getDownPayment(), $f['DownPayment']);
    	$this->assertEquals($c->getLanguage(), $f['Language']);
    	$this->assertEquals($c->getMultiplePayments(), $f['MultiplePayments']);
    	$this->assertEquals($c->getMultiplePaymentsRepeat(), $f['MultiplePaymentsRepeat']);
    	$this->assertEquals($c->getOrderId(), $f['OrderId']);
    	$this->assertEquals($c->getPayToEmail(), $f['PayToEmail']);
    	$this->assertEquals($c->getRebill(), $f['Rebill']);
    	$this->assertEquals($c->getRecurrence(), $f['Recurrence']);
    	$this->assertEquals($c->getReturnUrl(), $f['ReturnUrl']);
    	$this->assertEquals($c->getSecure(), $f['3DS']);
    	$this->assertEquals($c->getSendEmail(), $f['SendEmail']);
    	$this->assertEquals($c->getUserAgent(), $f['UserAgent']);
    	$this->assertEquals($c->getVersion(), $f['Version']);
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
    	$c->setVersion($f['Version']);
    	
    	$this->assertEquals($c->toArray(), $this->getFixture(true));
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
    			'SendEmail' => true,
    			'OrderId' => 123,
    			'Description' => 'Test description',
    			'Amount' => 12000,
   				'ClientIP' => '127.0.0.1',
   				'3DS' => false,
    			'ReturnUrl' => 'https:/www.easytransac.com',
    			'CancelUrl' => 'https:/www.easytransac.com',
    			'Customer' => [
    				'Firstname' => 'Mich'
    			],
    			'MultiplePayments' => false,
   				'MultiplePaymentsRepeat' => null,
   				'DownPayment' => null,
   				'Rebill' => null,
    			'Recurrence' => null,
    			'PayToEmail' => null,
    			'UserAgent' => null,
    			'Language' => 'FRE',
    			'Version' => 123
    		];
    	}
    	else
    	{
    		return [
    			'SendEmail' => true,
    			'OrderId' => 123,
    			'Description' => 'Test description',
    			'Amount' => 12000,
   				'ClientIP' => '127.0.0.1',
   				'3DS' => false,
   				'ReturnUrl' => 'https:/www.easytransac.com',
    			'CancelUrl' => 'https:/www.easytransac.com',
    			'Firstname' => 'Mich',
   				'MultiplePayments' => false,
    			'Language' => 'FRE',
    			'Version' => 123
    		];
    	}
    }
}

?>