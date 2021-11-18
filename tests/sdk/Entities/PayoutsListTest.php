<?php

use EasyTransac\Entities\PaymentRequestsHistoryRequest;
use EasyTransac\Entities\PayoutsListRequest;
use PHPUnit\Framework\TestCase;

class PayoutsListTest extends TestCase
{
    public function testToArray()
    {
        $c = new PayoutsListRequest();
        $f = $this->getFixture();

        $c->setLimit($f['Limit']);

        $this->assertEquals($c->toArray(), $this->getFixture());
    }

    public function testHydrate()
    {
        $c = new PayoutsListRequest();
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
