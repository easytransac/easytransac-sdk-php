<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class BankTransferInfosTest extends PHPUnit_Framework_TestCase
{
    public function testSettersGetters()
    {
		$f = $this->getFixture();
		$c = new \EasyTransac\Entities\BankTransferInfos();
		$c->hydrate(json_decode(json_encode($this->getFixture())));

        $this->assertEquals($c->getId(), "aa1B23");
        $this->assertEquals($c->getDate(), "2019-05-20 15:36:30");
        $this->assertEquals($c->getStatus(), "captured");
        $this->assertEquals($c->getAmount(), "100");
        $this->assertEquals($c->getFixFees(), "no");
        $this->assertEquals($c->getIban(), "11223344556677");
        $this->assertEquals($c->getBic(), "77665544332211");
        $this->assertEquals($c->getReference(), "azerty");

		$this->assertEquals($c->toArray(), $this->getFixture());
    }

	public function getFixture()
	{
		return $a = [
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
