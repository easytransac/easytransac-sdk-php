<?php

use EasyTransac\Entities\BankTransfersList;
use PHPUnit\Framework\TestCase;

class BankTransfersListEntityTest extends TestCase
{
    protected $c;
    protected $infos;

    public function testToArray()
    {
        $c = new BankTransfersList();
        $bts = json_decode(json_encode([$this->getFixture()]));
        $c->hydrate($bts);

        $this->assertEquals(['BankTransferInfos' => [['Bic' => 'bic123']]], $c->toArray());
    }

    public function getFixture(): array
    {
        return [
            'Bic' => 'bic123'
        ];
    }
}
