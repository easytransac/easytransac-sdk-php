<?php

namespace EasyTransac\Entities;

/**
 * Represents a credit card.
 *
 * This entity contains the credit card information required for transactions,
 * such as number, expiration date, CVV, etc.
 *
 * @package EasyTransac\Entities
 * 
 */
class CreditCard extends Entity
{
    /**
     * Card number (PAN).
     *
     * @var string|null
     * @map:CardNumber
     */
    protected $number = null;

    /**
     * Card expiration month (numeric, e.g., 01 to 12).
     *
     * @var string|null
     * @map:CardMonth
     */
    protected $month = null;

    /**
     * Card expiration year (4-digit format).
     *
     * @var string|null
     * @map:CardYear
     */
    protected $year = null;

    /**
     * Security code (CVV/CVC) on the back of the card.
     *
     * @var string|null
     * @map:CardCVV
     */
    protected $CVV = null;

    /**
     * Cardholder name.
     *
     * @var string|null
     * @map:CardOwner
     */
    protected $owner = null;

    /**
     * Card alias (internal identifier for future use).
     *
     * @var string|null
     * @map:Alias
     */
    protected $alias = null;

    /**
     * Identifier of the client the card is linked to.
     *
     * @var string|null
     * @map:ClientId
     */
    protected $clientId = null;

    /**
     * Card type (e.g., Visa, MasterCard).
     *
     * @var string|null
     * @map:CardType
     */
    protected $type = null;

    /**
     * Card issuing country (ISO code, e.g., FR, US).
     *
     * @var string|null
     * @map:CardCountry
     */
    protected $country = null;

    /**
     * Date of last access or last use of the card.
     *
     * @var string|null
     * @map:LastAccessed
     */
    protected $lastAccessed = null;

    /**
     * Indicates whether the card has been verified.
     *
     * @var string|null
     * @map:Verified
     */
    protected $verified = null;

    /**
     * Card status (active, expired, etc.).
     *
     * @var string|null
     * @map:Status
     */
    protected $status = null;

    /**
     * Returns the date of last access to the card.
     *
     * @return string|null
     */
    public function getLastAccessed()
    {
        return $this->lastAccessed;
    }

    /**
     * Returns whether the card is verified.
     *
     * @return string|null
     */
    public function getVerified()
    {
        return $this->verified;
    }

    /**
     * Returns the card status.
     *
     * @return string|null
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Returns the card issuing country.
     *
     * @return string|null
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Returns the card type (Visa, MasterCard, etc.).
     *
     * @return string|null
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets the card alias.
     *
     * @param string $value Card alias.
     * @return $this
     */
    public function setAlias($value)
    {
        $this->alias = $value;
        return $this;
    }

    /**
     * Returns the card alias.
     *
     * @return string|null
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * Sets the client identifier.
     *
     * @param string $value Client ID.
     * @return $this
     */
    public function setClientId($value)
    {
        $this->clientId = $value;
        return $this;
    }

    /**
     * Returns the client identifier.
     *
     * @return string|null
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * Sets the cardholder name.
     *
     * @param string $value Cardholder name.
     * @return $this
     */
    public function setOwner($value)
    {
        $this->owner = $value;
        return $this;
    }

    /**
     * Returns the cardholder name.
     *
     * @return string|null
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Sets the card CVV code.
     *
     * @param string $value CVV (security code).
     * @return $this
     */
    public function setCVV($value)
    {
        $this->CVV = $value;
        return $this;
    }

    /**
     * Returns the card CVV code.
     *
     * @return string|null
     */
    public function getCVV()
    {
        return $this->CVV;
    }

    /**
     * Sets the card expiration year.
     *
     * @param string $value Year (YYYY format).
     * @return $this
     */
    public function setYear($value)
    {
        $this->year = $value;
        return $this;
    }

    /**
     * Returns the card expiration year.
     *
     * @return string|null
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Sets the card expiration month.
     *
     * @param string $value Month (01 to 12).
     * @return $this
     */
    public function setMonth($value)
    {
        $this->month = $value;
        return $this;
    }

    /**
     * Returns the card expiration month.
     *
     * @return string|null
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * Sets the card number.
     *
     * @param string $value Card number.
     * @return $this
     */
    public function setNumber($value)
    {
        $this->number = $value;
        return $this;
    }

    /**
     * Returns the card number.
     *
     * @return string|null
     */
    public function getNumber()
    {
        return $this->number;
    }
}
