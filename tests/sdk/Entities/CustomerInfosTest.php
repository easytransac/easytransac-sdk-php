<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class CustomerInfosTest extends PHPUnit_Framework_TestCase
{
    protected $c;

    protected function setUp(): void
    {
        $this->c = new \EasyTransac\Entities\CustomerInfos();
        $this->c->setClientId("1234");
        $this->c->setCreationDate("2019-0-20 17:15:30");
        $this->c->setEmail("mail@example.com");
        $this->c->setUid("987654");
        $this->c->setCompany("Test Company");
        $this->c->setFirstname("Jean");
        $this->c->setLastname("Pierre");
        $this->c->setAddress("204 avenue de Colmar");
        $this->c->setZipCode("67100");
        $this->c->setCity("Strasbourg");
        $this->c->setCountry("France");
        $this->c->setCallingCode("+33");
        $this->c->setPhone("0611223344");
        $this->c->setBirthDate("1999-01-01");
        $this->c->setNationality("French");
        $this->c->setIban("11223344556677");
        $this->c->setBic("77665544332211");
    }

    public function testGetterSetters()
    {
        $this->assertEquals($this->c->getClientId(), "1234");
        $this->assertEquals($this->c->getCreationDate(), "2019-0-20 17:15:30");
        $this->assertEquals($this->c->getEmail(), "mail@example.com");
        $this->assertEquals($this->c->getUid(), "987654");
        $this->assertEquals($this->c->getCompany(), "Test Company");
        $this->assertEquals($this->c->getFirstname(), "Jean");
        $this->assertEquals($this->c->getLastname(), "Pierre");
        $this->assertEquals($this->c->getAddress(), "204 avenue de Colmar");
        $this->assertEquals($this->c->getZipCode(), "67100");
        $this->assertEquals($this->c->getCity(), "Strasbourg");
        $this->assertEquals($this->c->getCountry(), "France");
        $this->assertEquals($this->c->getCallingCode(), "+33");
        $this->assertEquals($this->c->getPhone(), "0611223344");
        $this->assertEquals($this->c->getBirthDate(), "1999-01-01");
        $this->assertEquals($this->c->getNationality(), "French");
        $this->assertEquals($this->c->getIban(), "11223344556677");
        $this->assertEquals($this->c->getBic(), "77665544332211");
    }

    public function testToArray()
    {
        $a = [
            "ClientId" => "1234",
            "CreationDate" => "2019-0-20 17:15:30",
            "Email" => "mail@example.com",
            "Uid" => "987654",
            "Company" => "Test Company",
            "Firstname" => "Jean",
            "Lastname" => "Pierre",
            "Address" => "204 avenue de Colmar",
            "ZipCode" => "67100",
            "City" => "Strasbourg",
            "Country" => "France",
            "CallingCode" => "+33",
            "Phone" => "0611223344",
            "BirthDate" => "1999-01-01",
            "Nationality" => "French",
            "Iban" => "11223344556677",
            "Bic" => "77665544332211",
        ];

        $this->assertEquals($this->c->toArray(), $a);
    }
}