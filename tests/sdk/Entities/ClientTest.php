<?php

use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    public function testSettersGetters()
    {
        $c = new EasyTransac\Entities\Client();
        $f = $this->getFixture();

        $c->setAddress($f['Address']);
        $c->setCity($f['City']);
        $c->setEmail($f['Email']);
        $c->setFirstname($f['Firstname']);
        $c->setId($f['Id']);
        $c->setLastname($f['Lastname']);
        $c->setPhone($f['Phone']);
        $c->setZipCode($f['ZipCode']);

        $this->assertEquals($c->getAddress(), $f['Address']);
        $this->assertEquals($c->getCity(), $f['City']);
        $this->assertEquals($c->getEmail(), $f['Email']);
        $this->assertEquals($c->getFirstname(), $f['Firstname']);
        $this->assertEquals($c->getId(), $f['Id']);
        $this->assertEquals($c->getLastname(), $f['Lastname']);
        $this->assertEquals($c->getPhone(), $f['Phone']);
        $this->assertEquals($c->getZipCode(), $f['ZipCode']);
    }

    public function testToArray()
    {
        $c = new EasyTransac\Entities\Client();
        $f = $this->getFixture();

        $c->setAddress($f['Address']);
        $c->setCity($f['City']);
        $c->setEmail($f['Email']);
        $c->setFirstname($f['Firstname']);
        $c->setId($f['Id']);
        $c->setLastname($f['Lastname']);
        $c->setPhone($f['Phone']);
        $c->setZipCode($f['ZipCode']);

        $this->assertEquals($c->toArray(), $f);
    }

    public function testHydrate()
    {
        $c = new EasyTransac\Entities\Client();
        $c->hydrate(json_decode(json_encode($this->getFixture())));

        $this->assertEquals($c->toArray(), $this->getFixture());
    }

    public function getFixture()
    {
        return [
            'Id' => '123',
            'Email' => 'test@test.com',
            'Firstname' => 'John',
            'Lastname' => 'Doe',
            'Phone' => '0388000000',
            'Address' => '204 av de Colmar',
            'ZipCode' => '67100',
            'City' => 'Strasbourg',
        ];
    }
}
