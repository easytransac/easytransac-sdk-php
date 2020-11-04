<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class DirectTransactionTest extends PHPUnit_Framework_TestCase
{
    public function testToArray()
    {
    	$c = new \EasyTransac\Entities\DirectTransaction();
    	$f = $this->getFixture();

    	$card = new \EasyTransac\Entities\CreditCard();
    	$card->setNumber($f['CreditCard']['CardNumber']);

    	$customer = new \EasyTransac\Entities\Customer();
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

		$c = new \EasyTransac\Entities\DirectTransaction();
		$c->setPreAuth('a');
		$c->setPreAuthDuration('b');
		$r = $c->toArray();
		$this->assertEquals($r['PreAuth'], 'a');
		$this->assertEquals($r['PreAuthDuration'], 'b');
    }

    public function testHydrate()
    {
    	$c = new \EasyTransac\Entities\DirectTransaction();
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

?>
