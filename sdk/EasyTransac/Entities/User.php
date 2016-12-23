<?php

namespace EasyTransac\Entities;

/**
 * Represents arguments for the request "AddUser" and "UpdateUser"
 * @author klyde
 * @copyright EasyTransac
 */
class User extends Entity
{
    /** @map:Id **/
    protected $id = null;
    /** @map:Email **/
    protected $email = null;
    /** @map:Password **/
    protected $password = null;
    /** @map:Identifier **/
    protected $identifier = null;
    /** @map:Company **/
    protected $company = null;
    /** @map:Firstname **/
    protected $firstname = null;
    /** @map:Lastname **/
    protected $lastname = null;
    /** @map:Address **/
    protected $address = null;
    /** @map:ZipCode **/
    protected $zipCode = null;
    /** @map:City **/
    protected $city = null;
    /** @map:CallingCode **/
    protected $callingCode = null;
    /** @map:Phone **/
    protected $phone = null;
    /** @map:BirthDate **/
    protected $birthDate = null;
    /** @map:Nationality **/
    protected $nationality = null;
    /** @map:AccountOwner **/
    protected $accountOwner = null;
    /** @map:Iban **/
    protected $iban = null;
    /** @map:Bic **/
    protected $bic = null;
    /** @map:Vat **/
    protected $vat = null;
    /** @map:Siret **/
    protected $siret = null;
    /** @map:ActivationEmail **/
    protected $activationEmail = null;
    /** @map:JoinDate **/
    protected $joinDate = null;
    /** @map:Balance **/
    protected $balance = null;
    /** @map:ConditionsAccepted **/
    protected $conditionsAccepted = null;
    /** @map:Active **/
    protected $active = null;
    /** @map:Tester **/
    protected $tester = null;
    /** @map:CompanyLogo **/
    protected $companyLogo = null;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    public function getIdentifier()
    {
        return $this->identifier;
    }

    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;
        return $this;
    }

    public function getCompany()
    {
        return $this->company;
    }

    public function setCompany($company)
    {
        $this->company = $company;
        return $this;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
        return $this;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
        return $this;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    public function getZipCode()
    {
        return $this->zipCode;
    }

    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;
        return $this;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    public function getCallingCode()
    {
        return $this->callingCode;
    }

    public function setCallingCode($callingCode)
    {
        $this->callingCode = $callingCode;
        return $this;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    public function getBirthDate()
    {
        return $this->birthDate;
    }

    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;
        return $this;
    }

    public function getNationality()
    {
        return $this->nationality;
    }

    public function setNationality($nationality)
    {
        $this->nationality = $nationality;
        return $this;
    }

    public function getAccountOwner()
    {
        return $this->accountOwner;
    }

    public function setAccountOwner($accountOwner)
    {
        $this->accountOwner = $accountOwner;
        return $this;
    }

    public function getIban()
    {
        return $this->iban;
    }

    public function setIban($iban)
    {
        $this->iban = $iban;
        return $this;
    }

    public function getBic()
    {
        return $this->bic;
    }

    public function setBic($bic)
    {
        $this->bic = $bic;
        return $this;
    }

    public function getVat()
    {
        return $this->vat;
    }

    public function setVat($vat)
    {
        $this->vat = $vat;
        return $this;
    }

    public function getSiret()
    {
        return $this->siret;
    }

    public function setSiret($siret)
    {
        $this->siret = $siret;
        return $this;
    }

    public function getActivationEmail()
    {
        return $this->activationEmail;
    }

    public function setActivationEmail($activationEmail)
    {
        $this->activationEmail = $activationEmail;
        return $this;
    }

    public function getJoinDate()
    {
        return $this->joinDate;
    }

    public function setJoinDate($joinDate)
    {
        $this->joinDate = $joinDate;
        return $this;
    }

    public function getBalance()
    {
        return $this->balance;
    }

    public function setBalance($balance)
    {
        $this->balance = $balance;
        return $this;
    }

    public function getConditionsAccepted()
    {
        return $this->conditionsAccepted;
    }

    public function setConditionsAccepted($conditionsAccepted)
    {
        $this->conditionsAccepted = $conditionsAccepted;
        return $this;
    }

    public function getActive()
    {
        return $this->active;
    }

    public function setActive($active)
    {
        $this->active = $active;
        return $this;
    }

    public function getTester()
    {
        return $this->tester;
    }

    public function setTester($tester)
    {
        $this->tester = $tester;
        return $this;
    }

    public function getCompanyLogo()
    {
        return $this->companyLogo;
    }

    public function setCompanyLogo($companyLogo)
    {
        $this->companyLogo = $companyLogo;
        return $this;
    }
}

?>