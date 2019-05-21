<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class BankTransferStatusTest extends PHPUnit_Framework_TestCase
{
    protected $c;

    protected function setUp(): void
    {
        $this->c = new \EasyTransac\Entities\CreditCardInfo();
        $this->c->setCardBin("1111222233334444");
        $this->c->setCardCountry("France");
        $this->c->setCardType("MasterCard");
        $this->c->setCardBank("Boursorama");
    }

    public function testGetterSetters()
    {
        $this->assertEquals($this->c->getCardBin(), "1111222233334444");
        $this->assertEquals($this->c->getCardCountry(), "France");
        $this->assertEquals($this->c->getCardType(), "MasterCard");
        $this->assertEquals($this->c->getCardBank(), "Boursorama");
    }

    public function testToArray()
    {
        $a = [
            "CardBin" => "1111222233334444",
            "CardCountry" => "France",
            "CardType" => "MasterCard",
            "CardBank" => "Boursorama",
        ];

        $this->assertEquals($this->c->toArray(), $a);
    }
}