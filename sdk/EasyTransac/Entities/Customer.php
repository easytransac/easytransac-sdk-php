<?php

namespace EasyTransac\Entities;

/**
 * Represents a customer
 * @author klyde
 * @copyright EasyTransac
 */
class Customer extends Entity
{
    /** @map:Email **/
    protected $email = null;
    /** @map:Firstname **/
    protected $firstname = null;
    /** @map:Lastname **/
    protected $lastname = null;
    /** @map:CallingCode **/
    protected $callingCode = null;
    /** @map:Phone **/
    protected $phone = null;
    /** @map:BirthDate **/
    protected $birthDate = null;
    /** @map:Nationality **/
    protected $nationality = null;
    /** @map:Address **/
    protected $address = null;
    /** @map:ZipCode **/
    protected $zipCode = null;
    /** @map:City **/
    protected $city = null;
    /** @map:Country **/
    protected $country = null;
    /** @map:Uid **/
    protected $uid = null;
    /** @map:ClientId **/
    protected $clientId = null;
    /** @map:Company **/
    protected $company = null;
    /** @map:Iban **/
    protected $iban = null;
    /** @map:Bic **/
    protected $bic = null;
    /** @map:Communication **/
    protected $communication = null;

    public function setUid($value)
    {
        $this->uid = $value;
        return $this;
    }

    public function getUid()
    {
        return $this->uid;
    }

    public function setCity($value)
    {
        $this->city = $value;
        return $this;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setZipCode($value)
    {
        $this->zipCode = $value;
        return $this;
    }

    public function getZipCode()
    {
        return $this->zipCode;
    }

    public function setAddress($value)
    {
        $this->address = $value;
        return $this;
    }

    public function getCountry()
    {
        return $this->country;
    }
    
    public function getAddress()
    {
        return $this->address;
    }

    public function setNationality($value)
    {
        $this->nationality = $value;
        return $this;
    }

    public function getNationality()
    {
        return $this->nationality;
    }

    public function setBirthDate($value)
    {
        $this->birthDate = $value;
        return $this;
    }

    public function getBirthDate()
    {
        return $this->birthDate;
    }

    public function setPhone($value)
    {
        $this->phone = $value;
        return $this;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setCallingCode($value)
    {
        $this->callingCode = $value;
        return $this;
    }

    public function getCallingCode()
    {
        return $this->callingCode;
    }

    public function setLastname($value)
    {
        $this->lastname = $value;
        return $this;
    }
    
    public function setCountry($value)
    {
        $this->country = $value;
        return $this;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function setFirstname($value)
    {
        $this->firstname = $value;
        return $this;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function setEmail($value)
    {
        $this->email = $value;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }
    
	public function getClientId() 
	{
		return $this->clientId;
	}
	
	public function setClientId($clientId) 
	{
		$this->clientId = $clientId;
		return $this;
	}
	
	public function getCompany()
	{
		return $this->company;
	}

	public function getIban()
	{
		return $this->iban;
	}

	public function getBic()
	{
		return $this->bic;
	}

	public function getCommunication()
	{
		return $this->communication;
	}

	public function setCompany($company)
	{
		$this->company = $company;
		return $this;
	}

	public function setIban($iban)
	{
		$this->iban = $iban;
		return $this;
	}

	public function setBic($bic)
	{
		$this->bic = $bic;
		return $this;
	}

	public function setCommunication($communication)
	{
		$this->communication = $communication;
		return $this;
	}
}

?>