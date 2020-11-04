<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class PaymentPageInfosTest extends PHPUnit_Framework_TestCase
{
    public function testHydrate()
    {
    	$c = new \EasyTransac\Entities\PaymentPageInfos();
    	$f = $this->getFixture();
    	$c->hydrate(json_decode(json_encode($f)));

    	$this->assertEquals($c->toArray(), $f);
		$this->assertEquals($c->getLanguage(), $f['Language']);
		$this->assertEquals($c->getAmount(), $f['Amount']);
		$this->assertEquals($c->getDate(), $f['Date']);
		$this->assertEquals($c->getEmail(), $f['Email']);
		$this->assertEquals($c->getPageUrl(), $f['PageUrl']);
		$this->assertEquals($c->getRequestId(), $f['RequestId']);
		$this->assertEquals($c->getStatus(), $f['Status']);
		$this->assertEquals($c->getOperationType(), $f['OperationType']);
		$this->assertEquals($c->getDateSent(), $f['DateSent']);
    }

    protected function getFixture($full = false)
    {
    	return [
    		'Status' => 'captured',
    		'Date' => '2016-12-06 12:23',
    		'Amount' => 12000,
    		'PageUrl' => 'https://www.test.com',
    		'RequestId' => 123,
    		'Email' => 'test@test.com',
    		'Language' => 'FRE',
    		'OperationType' => 'payment',
    		'DateSent' => '2016-12-06 12:24',
    		'3DSecure' => 'yes',
    	];
    }
}

?>
