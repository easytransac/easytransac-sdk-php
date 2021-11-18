<?php

use EasyTransac\Entities\PaymentRequestsHistoryRequest;
use PHPUnit\Framework\TestCase;

class PaymentRequestsHistoryTest extends TestCase
{
    public function testToArray()
    {
        $c = new PaymentRequestsHistoryRequest();
        $f = $this->getFixture();

        $c->setLimit($f['Limit']);
        $c->setRemote($f['Remote']);

        $this->assertEquals($c->toArray(), $this->getFixture());
    }


    public function testHydrate()
    {
        $c = new PaymentRequestsHistoryRequest();
        $c->hydrate(json_decode(json_encode($this->getFixture())));

        $this->assertEquals($c->toArray(), $this->getFixture());
    }

    protected function getFixture(): array
    {
        return [
            'Limit' => 10,
            'Remote' => 'yes'
        ];
    }
}
