<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class UserTest extends PHPUnit_Framework_TestCase
{
    public function testSettersGetters()
    {
    	$c = new \EasyTransac\Entities\User();
    	$f = $this->getFixture();

    	$c->setAccountOwner($f['AccountOwner']);
    	$c->setActive($f['Active']);
    	$c->setAddress($f['Address']);
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
    	$c->setLastname($f['Lastname']);
    	$c->setNationality($f['Nationality']);
    	$c->setPassword($f['Password']);
    	$c->setPhone($f['Phone']);
    	$c->setSiret($f['Siret']);
    	$c->setVat($f['Vat']);
    	$c->setZipCode($f['ZipCode']);
    	$c->setCompanyType($f['CompanyType']);
    	$c->setCompanyCountry($f['CompanyCountry']);
    	$c->setGender($f['Gender']);
    	$c->setCountry($f['Country']);

    	$this->assertEquals($c->getAccountOwner(), $f['AccountOwner']);
    	$this->assertEquals($c->getActive(), $f['Active']);
    	$this->assertEquals($c->getAddress(), $f['Address']);
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
    	$this->assertEquals($c->getLastname(), $f['Lastname']);
    	$this->assertEquals($c->getNationality(), $f['Nationality']);
    	$this->assertEquals($c->getPassword(), $f['Password']);
    	$this->assertEquals($c->getPhone(), $f['Phone']);
    	$this->assertEquals($c->getSiret(), $f['Siret']);
    	$this->assertEquals($c->getVat(), $f['Vat']);
    	$this->assertEquals($c->getZipCode(), $f['ZipCode']);
    	$this->assertEquals($c->getCompanyType(), $f['CompanyType']);
    	$this->assertEquals($c->getCompanyCountry(), $f['CompanyCountry']);
    	$this->assertEquals($c->getGender(), $f['Gender']);
    	$this->assertEquals($c->getCountry(), $f['Country']);

		// Bonus

		$c = new \EasyTransac\Entities\User();
		$c->setBirthName('a');
		$this->assertEquals($c->getBirthName(), 'a');
		$c->setCompanyAddress0('b');
		$this->assertEquals($c->getCompanyAddress0(), 'b');
		$c->setCompanyAddress('c');
		$this->assertEquals($c->getCompanyAddress(), 'c');
		$c->setCompanyCity('d');
		$this->assertEquals($c->getCompanyCity(), 'd');
		$c->setCompanyZipCode('e');
		$this->assertEquals($c->getCompanyZipCode(), 'e');

    }

    public function testToArray()
    {
    	$c = new \EasyTransac\Entities\User();
    	$f = $this->getFixture();

    	$c->setAccountOwner($f['AccountOwner']);
    	$c->setActivationEmail($f['ActivationEmail']);
    	$c->setActive($f['Active']);
    	$c->setAddress($f['Address']);
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
    	$c->setLastname($f['Lastname']);
    	$c->setNationality($f['Nationality']);
    	$c->setPassword($f['Password']);
    	$c->setPhone($f['Phone']);
    	$c->setSiret($f['Siret']);
    	$c->setVat($f['Vat']);
    	$c->setZipCode($f['ZipCode']);
    	$c->setCompanyType($f['CompanyType']);
    	$c->setCompanyCountry($f['CompanyCountry']);
    	$c->setGender($f['Gender']);
    	$c->setCountry($f['Country']);
    	$c->setWelcomeEmail($f['WelcomeEmail']);

    	$this->assertEquals($c->toArray(), $f);
    }

    public function testHydrate()
    {
    	$c = new \EasyTransac\Entities\User();
    	$f = $this->getFixture(true);
    	$c->hydrate(json_decode(json_encode($f)));

		var_dump($c->toArray());
    	$this->assertEquals($c->toArray(), $f);
		$this->assertEquals($c->getBalance(), $f['Balance']);
		$this->assertEquals($c->getJoinDate(), $f['JoinDate']);
		$this->assertEquals($c->getTester(), $f['Tester']);

		$c = new \EasyTransac\Entities\User();
		$c->hydrate(json_decode(json_encode([
			'KYC' => 'a',
			'PSPApproved' => 'b',
			'CompleteActivities' => 'c',
			'CompleteDocuments' => 'd',
			'Logo' => 'e',
			'Live' => 'f',
		])));
		$this->assertEquals($c->getKYC(), 'a');
		$this->assertEquals($c->getPSPApproved(), 'b');
		$this->assertEquals($c->getCompleteActivities(), 'c');
		$this->assertEquals($c->getCompleteDocuments(), 'd');
		$this->assertEquals($c->getLogo(), 'e');
		$this->assertEquals($c->getLive(), 'f');
    }

    protected function getFixture($full = false)
    {
		if ($full)
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
				'Active' => 'yes',
				'Tester' => 'yes',
				'CompanyLogo' => 'toto.png',
				'CompanyType' => 'entrepreneur',
				'CompanyCountry' => 'FRA',
				'Gender' => 'male',
				'Country' => 'FRA',
				'WelcomeEmail' => 'yes',
			];
		}
		else
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
				'ConditionsAccepted' => '2016-12-06',
				'Active' => 'yes',
				'CompanyLogo' => 'toto.png',
				'CompanyType' => 'entrepreneur',
				'CompanyCountry' => 'FRA',
				'Gender' => 'male',
				'Country' => 'FRA',
				'WelcomeEmail' => 'yes',
			];
		}
    }
}

?>
