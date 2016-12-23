<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class UserTest extends PHPUnit_Framework_TestCase
{
    public function testSettersGetters()
    {
    	$c = new \EasyTransac\Entities\User();
    	$f = $this->getFixture();
    	
    	$c->setAccountOwner($f['AccountOwner']);
    	$c->setActivationEmail($f['ActivationEmail']);
    	$c->setActive($f['Active']);
    	$c->setAddress($f['Address']);
    	$c->setBalance($f['Balance']);
    	$c->setBic($f['Bic']);
    	$c->setBirthDate($f['BirthDate']);
    	$c->setCallingCode($f['CallingCode']);
    	$c->setCity($f['City']);
    	$c->setCompany($f['Company']);
    	$c->setCompanyLogo($f['CompanyLogo']);
    	$c->setConditionsAccepted($f['ConditionsAccepted']);
    	$c->setEmail($f['Email']);
    	$c->setFirstname($f['Firstname']);
    	$c->setIban($f['Iban']);
    	$c->setId($f['Id']);
    	$c->setIdentifier($f['Identifier']);
    	$c->setJoinDate($f['JoinDate']);
    	$c->setLastname($f['Lastname']);
    	$c->setNationality($f['Nationality']);
    	$c->setPassword($f['Password']);
    	$c->setPhone($f['Phone']);
    	$c->setSiret($f['Siret']);
    	$c->setTester($f['Tester']);
    	$c->setVat($f['Vat']);
    	$c->setZipCode($f['ZipCode']);
    	
    	$this->assertEquals($c->getAccountOwner(), $f['AccountOwner']);
    	$this->assertEquals($c->getActivationEmail(), $f['ActivationEmail']);
    	$this->assertEquals($c->getActive(), $f['Active']);
    	$this->assertEquals($c->getAddress(), $f['Address']);
    	$this->assertEquals($c->getBalance(), $f['Balance']);
    	$this->assertEquals($c->getBic(), $f['Bic']);
    	$this->assertEquals($c->getBirthDate(), $f['BirthDate']);
    	$this->assertEquals($c->getCallingCode(), $f['CallingCode']);
    	$this->assertEquals($c->getCity(), $f['City']);
    	$this->assertEquals($c->getCompany(), $f['Company']);
    	$this->assertEquals($c->getCompanyLogo(), $f['CompanyLogo']);
    	$this->assertEquals($c->getConditionsAccepted(), $f['ConditionsAccepted']);
    	$this->assertEquals($c->getEmail(), $f['Email']);
    	$this->assertEquals($c->getFirstname(), $f['Firstname']);
    	$this->assertEquals($c->getIban(), $f['Iban']);
    	$this->assertEquals($c->getId(), $f['Id']);
    	$this->assertEquals($c->getIdentifier(), $f['Identifier']);
    	$this->assertEquals($c->getJoinDate(), $f['JoinDate']);
    	$this->assertEquals($c->getLastname(), $f['Lastname']);
    	$this->assertEquals($c->getNationality(), $f['Nationality']);
    	$this->assertEquals($c->getPassword(), $f['Password']);
    	$this->assertEquals($c->getPhone(), $f['Phone']);
    	$this->assertEquals($c->getSiret(), $f['Siret']);
    	$this->assertEquals($c->getTester(), $f['Tester']);
    	$this->assertEquals($c->getVat(), $f['Vat']);
    	$this->assertEquals($c->getZipCode(), $f['ZipCode']);
    }

    public function testToArray()
    {
    	$c = new \EasyTransac\Entities\User();
    	$f = $this->getFixture();
    	 
    	$c->setAccountOwner($f['AccountOwner']);
    	$c->setActivationEmail($f['ActivationEmail']);
    	$c->setActive($f['Active']);
    	$c->setAddress($f['Address']);
    	$c->setBalance($f['Balance']);
    	$c->setBic($f['Bic']);
    	$c->setBirthDate($f['BirthDate']);
    	$c->setCallingCode($f['CallingCode']);
    	$c->setCity($f['City']);
    	$c->setCompany($f['Company']);
    	$c->setCompanyLogo($f['CompanyLogo']);
    	$c->setConditionsAccepted($f['ConditionsAccepted']);
    	$c->setEmail($f['Email']);
    	$c->setFirstname($f['Firstname']);
    	$c->setIban($f['Iban']);
    	$c->setId($f['Id']);
    	$c->setIdentifier($f['Identifier']);
    	$c->setJoinDate($f['JoinDate']);
    	$c->setLastname($f['Lastname']);
    	$c->setNationality($f['Nationality']);
    	$c->setPassword($f['Password']);
    	$c->setPhone($f['Phone']);
    	$c->setSiret($f['Siret']);
    	$c->setTester($f['Tester']);
    	$c->setVat($f['Vat']);
    	$c->setZipCode($f['ZipCode']);
    	
    	$this->assertEquals($c->toArray(), $f);
    }
    
    public function testHydrate()
    {
    	$c = new \EasyTransac\Entities\User();
    	$f = $this->getFixture();
    	$c->hydrate(json_decode(json_encode($f)));
    	
    	$this->assertEquals($c->toArray(), $f);
    }
    
    protected function getFixture()
    {
    	return [
    		'Id' => 123,
    		'Email' => 'test@test.com',
    		'Password' => '123456',
    		'Identifier' => '753',
    		'Company' => 'Company Test',
    		'Firstname' => 'Mich',
    		'Lastname' => 'Choi',
    		'Address' => 'Rue du test',
    		'ZipCode' => '67000',
    		'City' => 'Strasbourg',
    		'CallingCode' => '33',
    		'Phone' => '0300000000',
    		'BirthDate' => '1983-03-19',
    		'Nationality' => 'FRA',
    		'AccountOwner' => 'Mich Choi',
    		'Iban' => 'FR123',
    		'Bic' => '987',
    		'Vat' => '456',
    		'Siret' => '951',
    		'ActivationEmail' => 'test@test.com',
    		'JoinDate' => '2016-12-05',
    		'Balance' => '0',
    		'ConditionsAccepted' => '2016-12-06',
    		'Active' => true,
    		'Tester' => true,
    		'CompanyLogo' => 'toto.png',
    	];
    }
}

?>