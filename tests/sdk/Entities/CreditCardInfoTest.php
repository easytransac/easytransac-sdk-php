<?php

use EasyTransac\Entities\CreditCardInfo;
use PHPUnit\Framework\TestCase;

class CreditCardInfoTest extends TestCase
{
    public function testHydrate()
    {
        $f = $this->getFixture();
        $c = new CreditCardInfo();
        $c->hydrate(json_decode(json_encode($f)));

        $this->assertEquals($c->toArray(), $f);

        $this->assertEquals($c->getCardBin(), $f['CardBIN']);
        $this->assertEquals($c->getCardCountry(), $f['CardCountry']);
        $this->assertEquals($c->getCardType(), $f['CardType']);
        $this->assertEquals($c->getCardBank(), $f['CardBank']);

        $c = new CreditCardInfo();
        $c->hydrate(json_decode(json_encode([
            'Alias' => 'abc',
            'CardMonth' => '01',
            'CardYear' => '20',
        ])));
        $this->assertEquals('abc', $c->getAlias());
        $this->assertEquals('01', $c->getCardMonth());
        $this->assertEquals('20', $c->getCardYear());
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
