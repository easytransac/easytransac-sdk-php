<?php

use EasyTransac\Entities\BankTransferInfos;
use PHPUnit\Framework\TestCase;

class BankTransferInfosTest extends TestCase
{
    public function testSettersGetters()
    {
        $c = new BankTransferInfos();
        $c->hydrate(json_decode(json_encode($this->getFixture())));

        $this->assertEquals("aa1B23", $c->getId());
        $this->assertEquals("2019-05-20 15:36:30", $c->getDate());
        $this->assertEquals("captured", $c->getStatus());
        $this->assertEquals("100", $c->getAmount());
        $this->assertEquals("no", $c->getFixFees());
        $this->assertEquals("11223344556677", $c->getIban());
        $this->assertEquals("77665544332211", $c->getBic());
        $this->assertEquals("azerty", $c->getReference());

        $this->assertEquals($c->toArray(), $this->getFixture());
    }

    public function getFixture(): array
    {
        return [
            'Id' => 'aa1B23',
            'Date' => "2019-05-20 15:36:30",
            "Status" => "captured",
            "Amount" => "100",
            "FixFees" => "no",
            "Iban" => "11223344556677",
            "Bic" => "77665544332211",
            "Reference" => "azerty",
        ];
    }
}
