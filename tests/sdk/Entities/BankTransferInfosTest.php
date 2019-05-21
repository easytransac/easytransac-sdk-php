<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class BankTransferInfosTest extends PHPUnit_Framework_TestCase
{
    protected $c;

    protected function setUp(): void
    {
        $this->c = new \EasyTransac\Entities\BankTransferInfos();
        $this->c->setId("aa1B23");
        $this->c->setDate("2019-05-20 15:36:30");
        $this->c->setStatus("captured");
        $this->c->setAmount("100");
        $this->c->setFixFees("no");
        $this->c->setIban("11223344556677");
        $this->c->setBic("77665544332211");
        $this->c->setReference("azerty");
    }

    public function testSettersGetters()
    {
        $this->assertEquals($this->c->getId(), "aa1B23");
        $this->assertEquals($this->c->getDate(), "2019-05-20 15:36:30");
        $this->assertEquals($this->c->getStatus(), "captured");
        $this->assertEquals($this->c->getAmount(), "100");
        $this->assertEquals($this->c->getFixFees(), "no");
        $this->assertEquals($this->c->getIban(), "11223344556677");
        $this->assertEquals($this->c->getBic(), "77665544332211");
        $this->assertEquals($this->c->getReference(), "azerty");
    }

    public function testToArray()
    {
        $a = [
            'Id' => 'aa1B23',
            'Date' => "2019-05-20 15:36:30",
            "Status" => "captured",
            "Amount" => "100",
            "FixFees" => "no",
            "Iban" => "11223344556677",
            "Bic" => "77665544332211",
            "Reference" => "azerty",
        ];
        $this->assertEquals($this->c->toArray(), $a);
    }
}