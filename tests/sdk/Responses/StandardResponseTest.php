<?php

use EasyTransac\Entities\Customer;
use EasyTransac\Responses\StandardResponse;
use PHPUnit\Framework\TestCase;

class StandardResponseTest extends TestCase
{
    public function testIsSuccess()
    {
        $c = new StandardResponse();
        $c->setSuccess(true);

        $this->assertTrue($c->isSuccess());
    }

    public function testGetErrorCode()
    {
        $c = new StandardResponse();
        $c->setErrorCode(123);

        $this->assertEquals(123, $c->getErrorCode());
    }

    public function testGetContent()
    {
        $customer = new Customer();
        $c = new StandardResponse();
        $c->setContent($customer);

        $this->assertEquals($c->getContent(), $customer);
    }

    public function testGetErrorMessage()
    {
        $c = new StandardResponse();
        $c->setErrorMessage('message');

        $this->assertEquals('message', $c->getErrorMessage());
    }

    public function testIsSameSignature()
    {
        $c = new StandardResponse();

        $c->setSameSignature(true);
        $this->assertTrue($c->isSameSignature());

        $c->setSameSignature(false);
        $this->assertFalse($c->isSameSignature());
    }

    public function testResponseMisc()
    {
        $c = new StandardResponse(json_decode('{"Code":0,"Signature":"a5ac24b84a0d13b4199ecbd084bcb54a6351400f","Result":{"Alias":"a1b2c3d4","CardNumber":"4234********4321","CardMonth":"09","CardYear":"2020","CardType":"visa","CardCountry":"FRA","LastAccessed":"2015-11-2617:26:25"}}'));
        $this->assertTrue(is_array($c->getRealArrayResponse()));
        $this->assertTrue(is_object($c->getRealJsonResponse()));

        $c = new StandardResponse();
        $this->assertEquals(null, $c->getRealArrayResponse());
    }
}
