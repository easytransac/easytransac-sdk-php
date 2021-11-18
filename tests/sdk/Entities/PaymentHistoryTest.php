<?php

use EasyTransac\Entities\PaymentHistoryRequest;
use PHPUnit\Framework\TestCase;

class PaymentHistoryTest extends TestCase
{
    public function testToArray()
    {
        $c = new PaymentHistoryRequest();
        $f = $this->getFixture();

        $c->setLimit($f['Limit']);

        $this->assertEquals($c->toArray(), $this->getFixture());
    }


    public function testHydrate()
    {
        $c = new PaymentHistoryRequest();
        $c->hydrate(json_decode(json_encode($this->getFixture())));

        $this->assertEquals($c->toArray(), $this->getFixture());
    }

    protected function getFixture(): array
    {
        return [
            'Limit' => 10,
        ];
    }
}
