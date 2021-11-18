<?php

use EasyTransac\Entities\PaymentPageResend;
use PHPUnit\Framework\TestCase;

class PaymentPageResendTest extends TestCase
{
    public function testHydrate()
    {
        $c = new PaymentPageResend();
        $c->hydrate(json_decode(json_encode($this->getFixture())));

        $this->assertEquals($c->toArray(), $this->getFixture());
    }

    protected function getFixture(): array
    {
        return [
            "RequestId" => "111",
            "Language" => "FRE",
        ];
    }
}
