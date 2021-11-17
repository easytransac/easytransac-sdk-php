<?php

use PHPUnit\Framework\TestCase;

class PaymentPageCancellationInfos extends TestCase
{
    public function testHydrate()
    {
        $c = new \EasyTransac\Entities\PaymentPageCancellationInfos();
        $c->hydrate(json_decode(json_encode($this->getFixture())));

        $this->assertEquals($c->toArray(), $this->getFixture());
    }

    protected function getFixture()
    {
        return [
            "RequestId" => "111",
            "Status" => "captured",
            "Date" => "2019-05-21 17:07:30",
            "DateSent" => "2019-05-21 17:00:30",
            "Amount" => "100",
            "3DSecure" => "no",
            "PageUrl" => "www.easytransac.com",
            "Email" => "contact@easytransac.com",
            "Language" => "FRE",
        ];
    }
}
