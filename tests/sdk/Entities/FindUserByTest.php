<?php

use PHPUnit\Framework\TestCase;

class FindUserByTest extends TestCase
{
    public function testToArray()
    {
        $c = new EasyTransac\Entities\FindUserBy();
        $f = $this->getFixture();

        $c->setEmail($f['Email']);
        $c->setId($f['Id']);

        $this->assertEquals($c->toArray(), $f);
    }

    public function testHydrate()
    {
        $c = new EasyTransac\Entities\FindUserBy();
        $c->hydrate(json_decode(json_encode($this->getFixture())));

        $this->assertEquals($c->toArray(), $this->getFixture());
    }

    public function getFixture()
    {
        return [
            'Email' => 'test@easytransac.com',
            'Id' => '123'
        ];
    }
}
