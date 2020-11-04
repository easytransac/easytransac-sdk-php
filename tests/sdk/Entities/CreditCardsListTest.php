<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class CreditCardsListTest extends PHPUnit_Framework_TestCase
{
    public function testHydrate()
    {
    	$list = new \EasyTransac\Entities\CreditCardsList();

    	$cards = json_decode(json_encode([$this->getFixture()]));
		$fixtureCards = [$this->getFixture()];
    	$list->hydrate($cards);
    	$this->assertEquals($list->toArray(), ['CreditCard' => $fixtureCards]);
		
		$this->assertTrue(is_array($list->getCreditCards())
							&& count($list->getCreditCards()) == count($fixtureCards)
							&& $list->getCreditCards()[0] instanceof EasyTransac\Entities\CreditCard);
    }

    protected function getFixture()
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
}

?>
