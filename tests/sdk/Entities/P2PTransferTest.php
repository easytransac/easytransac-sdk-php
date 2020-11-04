<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class P2PTransferTest extends PHPUnit_Framework_TestCase
{
    public function testSetters()
    {
    	$c = new \EasyTransac\Entities\P2PTransfer();
    	$f = $this->getFixture();

    	$c->setFrom($f['From']);
    	$c->setTo($f['To']);
    	$c->setTid($f['Tid']);
    	$c->setAmount($f['Amount']);
    	$c->setDescription($f['Description']);
    	$c->setLanguage($f['Language']);

    	$this->assertEquals($c->toArray(), $f);
    }

    public function testHydrate()
    {
    	$c = new \EasyTransac\Entities\P2PTransfer();
    	$c->hydrate(json_decode(json_encode($this->getFixture())));

    	$this->assertEquals($c->toArray(), $this->getFixture());
    }

	public function testReturn()
	{
		$f = $this->getFixtureReturn();
		$c = new \EasyTransac\Entities\P2PTransfer();
		$c->hydrate(json_decode(json_encode($f)));

		$this->assertEquals($c->getFrom(), $f['From']);
		$this->assertEquals($c->getTo(), $f['To']);
		$this->assertEquals($c->getAmount(), $f['Amount']);
		$this->assertEquals($c->getStatus(), $f['Status']);
		$this->assertEquals($c->getOriginalTid(), $f['OriginalTid']);
		$this->assertEquals($c->getDate(), $f['Date']);
	}

	protected function getFixtureReturn()
	{
		return [
			"From" => 1234,
			"To" => 5678,
			"Amount" => 29.99,
			"Status" => "captured",
			"OriginalTid" => "abcd1234",
			"Date" => "2019-06-03 17:05:30"
		];
	}

    protected function getFixture()
    {
    	return [
    		'From' => 'test@easytransac.com',
    		'To' => 'test2@easytransac.com',
    		'Tid' => 'abc123',
    		'Amount' => '1233',
    		'Description' => 'transfer p2p',
    		'Language' => 'fr',
    	];
    }
}

?>
