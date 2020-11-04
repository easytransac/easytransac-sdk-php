<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class BankTransfersListEntityTest extends PHPUnit_Framework_TestCase
{
    protected $c;
    protected $infos;

    public function testToArray()
    {
		$c = new \EasyTransac\Entities\BankTransfersList();
		$bts = json_decode(json_encode([$this->getFixture()]));
		$c->hydrate($bts);

    	$this->assertEquals($c->toArray(), ['BankTransferInfos' => [['Bic' => 'bic123']]]);
    }

	public function getFixture()
	{
		return [
			'Bic' => 'bic123'
		];
	}
}
