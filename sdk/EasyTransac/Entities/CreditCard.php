<?php

namespace EasyTransac\Entities;

/**
 * Represents a credit card
 * @author klyde
 * @copyright EasyTransac
 */
class CreditCard extends Entity
{
    /** @map:CardNumber **/
    protected $number = null;
    /** @map:CardMonth **/
    protected $month = null;
    /** @map:CardYear **/
    protected $year = null;
    /** @map:CardCVV **/
    protected $CVV = null;
    /** @map:CardOwner **/
    protected $owner = null;
    /** @map:Alias **/
    protected $alias = null;
    /** @map:ClientId **/
    protected $clientId = null;
    /** @map:CardType **/
    protected $type = null;
    /** @map:CardCountry **/
    protected $country = null;
    /** @map:LastAccessed **/
    protected $lastAccessed = null;
    /** @map:Verified **/
    protected $verified = null;
    /** @map:Status **/
    protected $status = null;

    public function getLastAccessed()
    {
        return $this->lastAccessed;
    }

    public function getVerified()
    {
        return $this->verified;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setAlias($value)
    {
        $this->alias = $value;
        return $this;
    }

    public function getAlias()
    {
        return $this->alias;
    }
    
    public function setClientId($value)
    {
        $this->clientId = $value;
        return $this;
    }

    public function getClientId()
    {
        return $this->clientId;
    }

    public function setOwner($value)
    {
        $this->owner = $value;
        return $this;
    }

    public function getOwner()
    {
        return $this->owner;
    }

    public function setCVV($value)
    {
        $this->CVV = $value;
        return $this;
    }

    public function getCVV()
    {
        return $this->CVV;
    }

    public function setYear($value)
    {
        $this->year = $value;
        return $this;
    }

    public function getYear()
    {
        return $this->year;
    }

    public function setMonth($value)
    {
        $this->month = $value;
        return $this;
    }

    public function getMonth()
    {
        return $this->month;
    }

    public function setNumber($value)
    {
        $this->number = $value;
        return $this;
    }

    public function getNumber()
    {
        return $this->number;
    }
}

?>
