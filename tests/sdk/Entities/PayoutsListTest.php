<?php

use PHPUnit\Framework\TestCase;

class PayoutsListTest extends TestCase
{
    public function testToArray()
    {
        $c = new EasyTransac\Entities\PayoutsListRequest();
        $f = $this->getFixture();

        $c->setLimit($f['Limit']);

        $this->assertEquals($c->toArray(), $this->getFixture());
    }

    public function testHydrate()
    {
        $c = new EasyTransac\Entities\PayoutsListRequest();
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
