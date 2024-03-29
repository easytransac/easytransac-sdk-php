<?php

use PHPUnit\Framework\TestCase;

class PaymentRequestsHistoryTest extends TestCase
{
    public function testToArray()
    {
        $c = new EasyTransac\Entities\PaymentRequestsHistoryRequest();
        $f = $this->getFixture();

        $c->setLimit($f['Limit']);
        $c->setRemote($f['Remote']);

        $this->assertEquals($c->toArray(), $this->getFixture());
    }

    public function testHydrate()
    {
        $c = new EasyTransac\Entities\PaymentRequestsHistoryRequest();
        $c->hydrate(json_decode(json_encode($this->getFixture())));

        $this->assertEquals($c->toArray(), $this->getFixture());
    }

    protected function getFixture()
    {
        return [
            'Limit' => 10,
            'Remote' => 'yes'
        ];
    }
}
