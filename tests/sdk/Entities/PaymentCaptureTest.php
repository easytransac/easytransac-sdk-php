<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class PaymentCaptureTest extends PHPUnit_Framework_TestCase
{
    protected $c;

    protected function setUp()
    {
        $this->c = new \EasyTransac\Entities\PaymentCapture();
        $this->c->setTid("1a2b3c");
        $this->c->setLanguage("French");
    }

    public function testSetterGetters()
    {
        $this->assertEquals($this->c->getTid(), "1a2b3c");
        $this->assertEquals($this->c->getLanguage(), "French");
    }

    public function testToArray()
    {
        $a = [
            "Tid" => "1a2b3c",
            "Language" => "French",
        ];

        $this->assertEquals($this->c->toArray(), $a);
    }
}