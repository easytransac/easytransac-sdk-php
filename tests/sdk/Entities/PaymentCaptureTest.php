<?php

use EasyTransac\Entities\PaymentCapture;
use PHPUnit\Framework\TestCase;

class PaymentCaptureTest extends TestCase
{
    protected $c;

    protected function setUp(): void
    {
        $this->c = new PaymentCapture();
        $this->c->setTid("1a2b3c");
        $this->c->setLanguage("French");
        $this->c->setAmount("1230");
    }

    public function testToArray()
    {
        $a = [
            "Tid" => "1a2b3c",
            "Language" => "French",
            "Amount" => "1230",
        ];

        $this->assertEquals($this->c->toArray(), $a);
    }
}
