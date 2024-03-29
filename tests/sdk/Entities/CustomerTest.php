<?php

use PHPUnit\Framework\TestCase;

class CustomerTest extends TestCase
{
    public function testSettersGetters()
    {
        $c = new EasyTransac\Entities\Customer();
        $f = $this->getFixture();

        $c->setAddress($f['Address']);
        $c->setBirthDate($f['BirthDate']);
        $c->setCallingCode($f['CallingCode']);
        $c->setCity($f['City']);
        $c->setEmail($f['Email']);
        $c->setFirstname($f['Firstname']);
        $c->setLastname($f['Lastname']);
        $c->setNationality($f['Nationality']);
        $c->setPhone($f['Phone']);
        $c->setUid($f['Uid']);
        $c->setZipCode($f['ZipCode']);
        $c->setCountry($f['Country']);
        $c->setClientId($f['ClientId']);
        $c->setCompany($f['Company']);
        $c->setIban($f['Iban']);
        $c->setBic($f['Bic']);
        $c->setCommunication($f['Communication']);

        $this->assertEquals($c->getAddress(), $f['Address']);
        $this->assertEquals($c->getBirthDate(), $f['BirthDate']);
        $this->assertEquals($c->getCallingCode(), $f['CallingCode']);
        $this->assertEquals($c->getCity(), $f['City']);
        $this->assertEquals($c->getEmail(), $f['Email']);
        $this->assertEquals($c->getFirstname(), $f['Firstname']);
        $this->assertEquals($c->getLastname(), $f['Lastname']);
        $this->assertEquals($c->getNationality(), $f['Nationality']);
        $this->assertEquals($c->getPhone(), $f['Phone']);
        $this->assertEquals($c->getUid(), $f['Uid']);
        $this->assertEquals($c->getZipCode(), $f['ZipCode']);
        $this->assertEquals($c->getCountry(), $f['Country']);
        $this->assertEquals($c->getClientId(), $f['ClientId']);
        $this->assertEquals($c->getCompany(), $f['Company']);
        $this->assertEquals($c->getIban(), $f['Iban']);
        $this->assertEquals($c->getBic(), $f['Bic']);
        $this->assertEquals($c->getCommunication(), $f['Communication']);
    }

    public function testToArray()
    {
        $c = new EasyTransac\Entities\Customer();
        $f = $this->getFixture();

        $c->setAddress($f['Address']);
        $c->setBirthDate($f['BirthDate']);
        $c->setCallingCode($f['CallingCode']);
        $c->setCity($f['City']);
        $c->setEmail($f['Email']);
        $c->setFirstname($f['Firstname']);
        $c->setLastname($f['Lastname']);
        $c->setNationality($f['Nationality']);
        $c->setPhone($f['Phone']);
        $c->setUid($f['Uid']);
        $c->setZipCode($f['ZipCode']);
        $c->setCountry($f['Country']);
        $c->setClientId($f['ClientId']);
        $c->setCompany($f['Company']);
        $c->setIban($f['Iban']);
        $c->setBic($f['Bic']);
        $c->setCommunication($f['Communication']);

        $this->assertEquals($c->toArray(), $this->getFixture());
    }

    public function testHydrate()
    {
        $c = new EasyTransac\Entities\Customer();
        $c->hydrate(json_decode(json_encode($this->getFixture())));

        $this->assertEquals($c->toArray(), $this->getFixture());
    }

    public function getFixture()
    {
        return [
            'Email' => 'john@doe.com',
            'Firstname' => 'Test firstname',
            'Lastname' => 'Test lastname',
            'CallingCode' => '33',
            'Phone' => '0388000000',
            'BirthDate' => '1983-03-19',
            'Nationality' => 'FRA',
            'Address' => '3 rue du Test',
            'ZipCode' => '67000',
            'City' => 'Strasbourg',
            'Uid' => '1234',
            'ClientId' => '12',
            'Country' => 'FRA',
            'Company' => 'EasyTransac',
            'Iban' => 'MyIban',
            'Bic' => 'MyBic',
            'Communication' => 'yes'
        ];
    }
}
