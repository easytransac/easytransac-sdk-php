<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class CreditCardTest extends PHPUnit_Framework_TestCase
{
    public function testSettersGetters()
    {
        $c = new \EasyTransac\Entities\CreditCard();
        $f = $this->getFixture();

        $c->setAlias($f['Alias']);
        $c->setCVV($f['CardCVV']);
        $c->setMonth($f['CardMonth']);
        $c->setNumber($f['CardNumber']);
        $c->setOwner($f['CardOwner']);
        $c->setYear($f['CardYear']);
		$c->setClientId('test');

        $this->assertEquals($c->getAlias(), $f['Alias']);
        $this->assertEquals($c->getCVV(), $f['CardCVV']);
        $this->assertEquals($c->getMonth(), $f['CardMonth']);
        $this->assertEquals($c->getNumber(), $f['CardNumber']);
        $this->assertEquals($c->getOwner(), $f['CardOwner']);
        $this->assertEquals($c->getYear(), $f['CardYear']);
        $this->assertEquals($c->getClientId(), 'test');
    }

    public function testToArray()
    {
    	$c = new \EasyTransac\Entities\CreditCard();
    	$f = $this->getFixture();

    	$c->setAlias($f['Alias']);
    	$c->setCVV($f['CardCVV']);
    	$c->setMonth($f['CardMonth']);
    	$c->setNumber($f['CardNumber']);
    	$c->setOwner($f['CardOwner']);
    	$c->setYear($f['CardYear']);

    	$this->assertEquals($c->toArray(), $this->getFixture());
    }

    public function testHydrate()
    {
		$f = $this->getFixture(true);
    	$c = new \EasyTransac\Entities\CreditCard();
    	$c->hydrate(json_decode(json_encode($f)));
    	$this->assertEquals($c->toArray(), $f);

		$this->assertEquals($c->getType(), $f['CardType']);
		$this->assertEquals($c->getCountry(), $f['CardCountry']);
		$this->assertEquals($c->getLastAccessed(), $f['LastAccessed']);

		$c = new \EasyTransac\Entities\CreditCard();
    	$c->hydrate(json_decode(json_encode([
			'Verified' => 'a',
			'Status' => 'b'
		])));
		$this->assertEquals($c->getVerified(), 'a');
		$this->assertEquals($c->getStatus(), 'b');
    }

    protected function getFixture($full = false)
    {
		if ($full)
		{
			return [
				'CardNumber' => '1234567891234567',
				'CardMonth' => '12',
				'CardYear' => '2018',
				'CardCVV' => '123',
				'CardOwner' => 'Mich',
				'Alias' => 'a1b2c3d4',
				'CardType' => 'visa',
				'CardCountry' => 'FR',
				'LastAccessed' => '2016-12-01 10:00:00',
			];
		}
		else
		{
			return [
				'CardNumber' => '1234567891234567',
				'CardMonth' => '12',
				'CardYear' => '2018',
				'CardCVV' => '123',
				'CardOwner' => 'Mich',
				'Alias' => 'a1b2c3d4',

			];
		}
    }
}

?>
