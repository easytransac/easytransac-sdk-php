<?php

use PHPUnit\Framework\TestCase;

class PaymentHistoryTest extends TestCase
{
    public function testToArray()
    {
        $c = new EasyTransac\Entities\PaymentHistoryRequest();
        $f = $this->getFixture();

        $c->setLimit($f['Limit']);

        $this->assertEquals($c->toArray(), $this->getFixture());
    }

    public function testHydrate()
    {
        $c = new EasyTransac\Entities\PaymentHistoryRequest();
        $c->hydrate(json_decode(json_encode($this->getFixture())));

        $this->assertEquals($c->toArray(), $this->getFixture());
    }

    protected function getFixture()
    {
        return [
            'Limit' => 10,
        ];
    }
}
