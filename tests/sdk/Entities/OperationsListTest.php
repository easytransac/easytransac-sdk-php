<?php

use EasyTransac\Entities\OperationsListRequest;
use PHPUnit\Framework\TestCase;

class OperationsListTest extends TestCase
{
    public function testToArray()
    {
        $c = new OperationsListRequest();
        $f = $this->getFixture();

        $c->setLimit($f['Limit']);

        $this->assertEquals($c->toArray(), $this->getFixture());
    }


    public function testHydrate()
    {
        $c = new OperationsListRequest();
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
