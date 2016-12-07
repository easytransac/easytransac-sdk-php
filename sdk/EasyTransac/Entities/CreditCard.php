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
    /** @map:EOM **/
    protected $eom = null;
    /** @map:KSN **/
    protected $ksn = null;
    /** @map:CardType **/
    protected $type = null;
    /** @map:CardCountry **/
    protected $country = null;
    /** @map:LastAccessed **/
    protected $lastAccessed = null;

    public function setLastAccessed($value)
    {
        $this->lastAccessed = $value;
        return $this;
    }
    
    public function getLastAccessed()
    {
        return $this->lastAccessed;
    }

    public function setCountry($value)
    {
        $this->country = $value;
        return $this;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setType($value)
    {
        $this->type = $value;
        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setKsn($value)
    {
        $this->ksn = $value;
        return $this;
    }

    public function getKsn()
    {
        return $this->ksn;
    }

    public function setEom($value)
    {
        $this->eom = $value;
        return $this;
    }

    public function getEom()
    {
        return $this->eom;
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