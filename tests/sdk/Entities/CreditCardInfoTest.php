<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class CreditCardInfoTest extends PHPUnit_Framework_TestCase
{
	public function testHydrate()
    {
		$f = $this->getFixture();
    	$c = new \EasyTransac\Entities\CreditCardInfo();
    	$c->hydrate(json_decode(json_encode($f)));

    	$this->assertEquals($c->toArray(), $f);

		$this->assertEquals($c->getCardBin(), $f['CardBIN']);
		$this->assertEquals($c->getCardCountry(), $f['CardCountry']);
		$this->assertEquals($c->getCardType(), $f['CardType']);
		$this->assertEquals($c->getCardBank(), $f['CardBank']);

		$c = new \EasyTransac\Entities\CreditCardInfo();
    	$c->hydrate(json_decode(json_encode([
			'Alias' => 'abc',
			'CardMonth' => '01',
			'CardYear' => '20',
		])));
		$this->assertEquals($c->getAlias(), 'abc');
		$this->assertEquals($c->getCardMonth(), '01');
		$this->assertEquals($c->getCardYear(), '20');
    }

    protected function getFixture()
    {
    	return [
    		"CardBIN" => "1111222233334444",
    		"CardCountry" => "France",
    		"CardType" => "MasterCard",
    		"CardBank" => "Boursorama",
    	];
    }
}
