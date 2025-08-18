<?php

namespace EasyTransac\Entities;

/**
 * Represents a customer of the EasyTransac platform.
 *
 * This entity contains the customer's personal, professional,
 * and banking information used for transactions.
 *
 * @package EasyTransac\
 * 
 */
class Customer extends Entity
{
    /**
     * Internal customer identifier.
     *
     * @var string|null
     * @map:Id
     */
    protected $id = null;

    /**
     * Customer email address.
     *
     * @var string|null
     * @map:Email
     */
    protected $email = null;

    /**
     * Customer first name.
     *
     * @var string|null
     * @map:Firstname
     */
    protected $firstname = null;

    /**
     * Customer last name.
     *
     * @var string|null
     * @map:Lastname
     */
    protected $lastname = null;

    /**
     * International dialing code (e.g., +33).
     *
     * @var string|null
     * @map:CallingCode
     */
    protected $callingCode = null;

    /**
     * Customer phone number.
     *
     * @var string|null
     * @map:Phone
     */
    protected $phone = null;

    /**
     * Customer date of birth (format YYYY-MM-DD).
     *
     * @var string|null
     * @map:BirthDate
     */
    protected $birthDate = null;

    /**
     * Customer nationality (ISO country code).
     *
     * @var string|null
     * @map:Nationality
     */
    protected $nationality = null;

    /**
     * Customer postal address.
     *
     * @var string|null
     * @map:Address
     */
    protected $address = null;

    /**
     * ZIP/postal code.
     *
     * @var string|null
     * @map:ZipCode
     */
    protected $zipCode = null;

    /**
     * City.
     *
     * @var string|null
     * @map:City
     */
    protected $city = null;

    /**
     * Country (ISO code, e.g., FR, BE).
     *
     * @var string|null
     * @map:Country
     */
    protected $country = null;

    /**
     * Internal UID (generated unique identifier).
     *
     * @var string|null
     * @map:Uid
     */
    protected $uid = null;

    /**
     * Customer identifier in the partner environment.
     *
     * @var string|null
     * @map:ClientId
     */
    protected $clientId = null;

    /**
     * Customer company name (if a legal entity).
     *
     * @var string|null
     * @map:Company
     */
    protected $company = null;

    /**
     * Customer bank account IBAN.
     *
     * @var string|null
     * @map:Iban
     */
    protected $iban = null;

    /**
     * Customer bank BIC/SWIFT code.
     *
     * @var string|null
     * @map:Bic
     */
    protected $bic = null;

    /**
     * Custom message or communication field.
     *
     * @var string|null
     * @map:Communication
     */
    protected $communication = null;

    /**
     * Customer creation date (format YYYY-MM-DD).
     *
     * @var string|null
     * @map:CreationDate
     */
    protected $creationDate = null;

    /**
     * Returns the customer's creation date.
     *
     * @return string|null
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Sets the customer's UID.
     *
     * @param string $value
     * @return $this
     */
    public function setUid($value)
    {
        $this->uid = $value;
        return $this;
    }

    /**
     * Returns the internal customer ID.
     *
     * @return string|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the internal customer ID.
     *
     * @param string $value
     * @return $this
     */
    public function setId($value)
    {
        $this->id = $value;
        return $this;
    }

    /**
     * Returns the customer's UID.
     *
     * @return string|null
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Sets the city.
     *
     * @param string $value
     * @return $this
     */
    public function setCity($value)
    {
        $this->city = $value;
        return $this;
    }

    /**
     * Returns the city.
     *
     * @return string|null
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Sets the ZIP/postal code.
     *
     * @param string $value
     * @return $this
     */
    public function setZipCode($value)
    {
        $this->zipCode = $value;
        return $this;
    }

    /**
     * Returns the ZIP/postal code.
     *
     * @return string|null
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * Sets the postal address.
     *
     * @param string $value
     * @return $this
     */
    public function setAddress($value)
    {
        $this->address = $value;
        return $this;
    }

    /**
     * Returns the country.
     *
     * @return string|null
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Returns the postal address.
     *
     * @return string|null
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Sets the nationality.
     *
     * @param string $value
     * @return $this
     */
    public function setNationality($value)
    {
        $this->nationality = $value;
        return $this;
    }

    /**
     * Returns the nationality.
     *
     * @return string|null
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * Sets the date of birth.
     *
     * @param string $value Format YYYY-MM-DD
     * @return $this
     */
    public function setBirthDate($value)
    {
        $this->birthDate = $value;
        return $this;
    }

    /**
     * Returns the date of birth.
     *
     * @return string|null
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * Sets the phone number.
     *
     * @param string $value
     * @return $this
     */
    public function setPhone($value)
    {
        $this->phone = $value;
        return $this;
    }

    /**
     * Returns the phone number.
     *
     * @return string|null
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Sets the international dialing code.
     *
     * @param string $value
     * @return $this
     */
    public function setCallingCode($value)
    {
        $this->callingCode = $value;
        return $this;
    }

    /**
     * Returns the international dialing code.
     *
     * @return string|null
     */
    public function getCallingCode()
    {
        return $this->callingCode;
    }

    /**
     * Sets the last name.
     *
     * @param string $value
     * @return $this
     */
    public function setLastname($value)
    {
        $this->lastname = $value;
        return $this;
    }

    /**
     * Sets the country.
     *
     * @param string $value
     * @return $this
     */
    public function setCountry($value)
    {
        $this->country = $value;
        return $this;
    }

    /**
     * Returns the last name.
     *
     * @return string|null
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Sets the first name.
     *
     * @param string $value
     * @return $this
     */
    public function setFirstname($value)
    {
        $this->firstname = $value;
        return $this;
    }

    /**
     * Returns the first name.
     *
     * @return string|null
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Sets the email address.
     *
     * @param string $value
     * @return $this
     */
    public function setEmail($value)
    {
        $this->email = $value;
        return $this;
    }

    /**
     * Returns the email address.
     *
     * @return string|null
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Returns the partner-side client identifier.
     *
     * @return string|null
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * Sets the partner-side client identifier.
     *
     * @param string $clientId
     * @return $this
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
        return $this;
    }

    /**
     * Returns the company name.
     *
     * @return string|null
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Returns the IBAN.
     *
     * @return string|null
     */
    public function getIban()
    {
        return $this->iban;
    }

    /**
     * Returns the BIC.
     *
     * @return string|null
     */
    public function getBic()
    {
        return $this->bic;
    }

    /**
     * Returns the custom message / communication field.
     *
     * @return string|null
     */
    public function getCommunication()
    {
        return $this->communication;
    }

    /**
     * Sets the company name.
     *
     * @param string $company
     * @return $this
     */
    public function setCompany($company)
    {
        $this->company = $company;
        return $this;
    }

    /**
     * Sets the IBAN.
     *
     * @param string $iban
     * @return $this
     */
    public function setIban($iban)
    {
        $this->iban = $iban;
        return $this;
    }

    /**
     * Sets the BIC.
     *
     * @param string $bic
     * @return $this
     */
    public function setBic($bic)
    {
        $this->bic = $bic;
        return $this;
    }

    /**
     * Sets the custom message / communication field.
     *
     * @param string $communication
     * @return $this
     */
    public function setCommunication($communication)
    {
        $this->communication = $communication;
        return $this;
    }
}
