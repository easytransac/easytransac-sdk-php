<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class BankTransfersListEntityTest extends PHPUnit_Framework_TestCase
{
    protected $c;
    protected $infos;

    protected function setUp(): void
    {
        $this->c = new \EasyTransac\Entities\BankTransfersList();
        $this->infos = new \EasyTransac\Entities\BankTransferInfos();
        $this->infos->setBic('bic123');
        
        $this->c->setBankTransferInfos([$this->infos]);
    }

    public function testGetterSetters()
    {
    	$this->assertEquals($this->c->getBankTransferInfos(), [$this->infos]);
    }

    public function testToArray()
    {
    	$this->assertEquals($this->c->toArray(), ['BankTransferInfos' => [['Bic' => 'bic123']]]);
    }
}