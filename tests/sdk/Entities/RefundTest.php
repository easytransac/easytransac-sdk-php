<?php

use EasyTransac\Entities\Refund;
use PHPUnit\Framework\TestCase;

class RefundTest extends TestCase
{
    public function testToArray()
    {
        $c = new Refund();
        $f = $this->getFixture();

        $c->setLanguage($f['Language']);
        $c->setTid($f['Tid']);
        $c->setAmount($f['Amount']);
        $c->setReason($f['Reason']);

        $this->assertEquals($c->toArray(), $f);
    }

    public function testHydrate()
    {
        $c = new Refund();
        $c->hydrate(json_decode(json_encode($this->getFixture())));

        $this->assertEquals($c->toArray(), $this->getFixture());
    }

    public function getFixture(): array
    {
        return [
            'Language' => 'FRE',
            'Tid' => '123',
            'Amount' => '1234',
            'Reason' => 'i\'m a reason'
        ];
    }
}
