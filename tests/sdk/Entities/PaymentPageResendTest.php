<?php

use PHPUnit\Framework\TestCase;

class PaymentPageResendTest extends TestCase
{
    public function testHydrate()
    {
        $c = new EasyTransac\Entities\PaymentPageResend();
        $c->hydrate(json_decode(json_encode($this->getFixture())));

        $this->assertEquals($c->toArray(), $this->getFixture());
    }

    protected function getFixture()
    {
        return [
            "RequestId" => "111",
            "Language" => "FRE",
        ];
    }
}
