<?php

use PHPUnit\Framework\TestCase;

class CancellationInfosTest extends TestCase
{
    public function testToArray()
    {
        $f = $this->getFixture();
        $c = new EasyTransac\Entities\CancellationInfos();
        $c->hydrate(json_decode(json_encode($f)));

        $this->assertEquals($c->toArray(), $f);
        $this->assertEquals($c->getTid(), $f['Tid']);
        $this->assertEquals($c->getDate(), $f['Date']);
        $this->assertEquals($c->getMessage(), $f['Message']);
        $this->assertEquals($c->getOriginalPaymentTid(), $f['OriginalPaymentTid']);
    }

    public function getFixture()
    {
        return [
            'Tid' => '12ef',
            'Date' => '2016-12-01',
            'Message' => 'test message',
            'OriginalPaymentTid' => '123456'
        ];
    }
}
