<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class InitBankTransferTest extends PHPUnit_Framework_TestCase
{
    protected $c;

    protected function setUp()
    {
        $this->c = new \EasyTransac\Entities\PaymentPageCancellationInfos();
        $this->c->setRequestId("111");
        $this->c->setStatus("captured");
        $this->c->setDate("2019-05-21 17:07:30");
        $this->c->setDateSent("2019-05-21 17:00:30");
        $this->c->setAmount("100");
        $this->c->setSecure("no");
        $this->c->setPageUrl("www.easytransac.com");
        $this->c->setEmail("contact@easytransac.com");
        $this->c->setLanguage("French");
    }

    public function testSetterGetters()
    {
        $this->assertEquals($this->c->getRequestId(), "111");
        $this->assertEquals($this->c->getStatus(), "captured");
        $this->assertEquals($this->c->getDate(), "2019-05-21 17:07:30");
        $this->assertEquals($this->c->getDateSent(), "2019-05-21 17:00:30");
        $this->assertEquals($this->c->getAmount(), "100");
        $this->assertEquals($this->c->getSecure(), "no");
        $this->assertEquals($this->c->getPageUrl(), "www.easytransac.com");
        $this->assertEquals($this->c->getEmail(), "contact@easytransac.com");
        $this->assertEquals($this->c->getLanguage(), "French");
    }

    public function testToArray()
    {
        $a = [
            "RequestId" => "111",
            "Status" => "captured",
            "Date" => "2019-05-21 17:07:30",
            "DateSent" => "2019-05-21 17:00:30",
            "Amount" => "100",
            "Secure" => "no",
            "PageUrl" => "www.easytransac.com",
            "Email" => "contact@easytransac.com",
            "Language" => "French",
        ];

        $this->assertEquals($a, $this->c->toArray());
    }
}