<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class DebitTransactionTest extends PHPUnit_Framework_TestCase
{
    public function testSettersGetters()
    {
    	$c = new \EasyTransac\Entities\DebitTransaction();
    	$f = $this->getFixture();
    	
    	$customer = new \EasyTransac\Entities\Customer();
    	$customer->setLastname($f['Customer']['Lastname']);
    	
    	$c->setAmount($f['Amount']);
    	$c->setClientIp($f['ClientIp']);
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
    	$c->setIban($f['Iban']);
    	$c->setBic($f['Bic']);
    	
    	$this->assertEquals($c->getAmount(), $f['Amount']);
    	$this->assertEquals($c->getClientIp(), $f['ClientIp']);
    	$this->assertEquals($c->getCustomer(), $customer);
    	$this->assertEquals($c->getDescription(), $f['Description']);
    	$this->assertEquals($c->getDownPayment(), $f['DownPayment']);
    	$this->assertEquals($c->getMultiplePayments(), $f['MultiplePayments']);
    	$this->assertEquals($c->getOrderId(), $f['OrderId']);
    	$this->assertEquals($c->getSecure(), $f['3DS']);
    	$this->assertEquals($c->getUserAgent(), $f['UserAgent']);
    	$this->assertEquals($c->getLanguage(), $f['Language']);
    	$this->assertEquals($c->getPayToEmail(), $f['PayToEmail']);
    	$this->assertEquals($c->getRecurrence(), $f['Recurrence']);
    	$this->assertEquals($c->getRebill(), $f['Rebill']);
    	$this->assertEquals($c->getMultiplePaymentsRepeat(), $f['MultiplePaymentsRepeat']);
    	$this->assertEquals($c->getIban(), $f['Iban']);
    	$this->assertEquals($c->getBic(), $f['Bic']);
    }

    public function testToArray()
    {
    	$c = new \EasyTransac\Entities\DebitTransaction();
    	$f = $this->getFixture();
    	 
    	$customer = new \EasyTransac\Entities\Customer();
    	$customer->setLastname($f['Customer']['Lastname']);
    	 
    	$c->setAmount($f['Amount']);
    	$c->setClientIp($f['ClientIp']);
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
    	$c->setIban($f['Iban']);
    	$c->setBic($f['Bic']);
    	
    	$this->assertEquals($c->toArray(), $this->getFixture(true));
    }
    
    public function testHydrate()
    {
    	$c = new \EasyTransac\Entities\DebitTransaction();
    	$c->hydrate(json_decode(json_encode($this->getFixture())));

    	$this->assertEquals($c->toArray(), $this->getFixture(true));
    }
    
    public function getFixture($rendered = false)
    {
    	if (!$rendered)
    	{
	    	return [
	    		'Amount' => 12300,
	    		'OrderId' => 10,
	    		'Description' => 'Description of the transaction',
	    		'ClientIp' => '127.0.0.1',
	    		'3DS' => false,
	    		'DownPayment' => 3500,
	    		'MultiplePayments' => 3,
	    		'MultiplePaymentsRepeat' => 3,
	    		'Customer' => [
	    			'Lastname' => 'mich'
	    		],
	    		'Rebill' => true,
	    		'Recurrence' => 'monthly',
	    		'PayToEmail' => 'test@test.com',
	    		'UserAgent' => 'ua',
	    		'Language' => 'FRE',
	    		'Bic' => 'abc',
	    		'Iban' => 'abcde',
	    	];
    	}
    	else
    	{
    		return [
    			'Amount' => 12300,
    			'OrderId' => 10,
    			'Description' => 'Description of the transaction',
    			'ClientIp' => '127.0.0.1',
    			'3DS' => false,
    			'DownPayment' => 3500,
    			'MultiplePayments' => 3,
    			'MultiplePaymentsRepeat' => 3,
    			'Lastname' => 'mich',
    			'Rebill' => true,
    			'Recurrence' => 'monthly',
    			'PayToEmail' => 'test@test.com',
    			'UserAgent' => 'ua',
    			'Language' => 'FRE',
    			'Bic' => 'abc',
    			'Iban' => 'abcde',
    		];
    	}
    }
}

?>