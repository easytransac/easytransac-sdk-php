<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class DebitTransactionTest extends PHPUnit_Framework_TestCase
{
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

		$customer = new \EasyTransac\Entities\DebitTransaction();
		$customer->setAccountOwner('a');
		$customer->setSddCallingCode('b');
		$customer->setSddPhone('c');
		$customer->setReturnUrl('d');
		$r = $customer->toArray();

		$this->assertEquals($r['AccountOwner'], 'a');
		$this->assertEquals($r['SddCallingCode'], 'b');
		$this->assertEquals($r['SddPhone'], 'c');
		$this->assertEquals($r['ReturnUrl'], 'd');
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
	    		'3DS' => 'no',
	    		'DownPayment' => 3500,
	    		'MultiplePayments' => 3,
	    		'MultiplePaymentsRepeat' => 3,
	    		'Customer' => [
	    			'Lastname' => 'mich'
	    		],
	    		'Rebill' => 'yes',
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
    			'3DS' => 'no',
    			'DownPayment' => 3500,
    			'MultiplePayments' => 3,
    			'MultiplePaymentsRepeat' => 3,
    			'Lastname' => 'mich',
    			'Rebill' => 'yes',
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
