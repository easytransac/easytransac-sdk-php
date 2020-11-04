<?php

namespace EasyTransac\Entities;

/**
 * Represents details of a credit card
 * @author klyde
 * @copyright EasyTransac
 */
class CreditCardInfo extends Entity
{
    /** @map:CardBIN **/
    protected $cardBin = null;
    /** @map:CardCountry **/
    protected $cardCountry = null;
    /** @map:CardType **/
    protected $cardType = null;
    /** @map:CardBank **/
    protected $cardBank = null;
    /** @map:Alias **/
    protected $alias = null;
    /** @map:CardMonth **/
    protected $cardMonth = null;
    /** @map:CardYear **/
    protected $cardYear = null;
    
    public function getCardBin()
    {
        return $this->cardBin;
    }

    public function getCardCountry()
    {
        return $this->cardCountry;
    }

    public function getCardType()
    {
        return $this->cardType;
    }

    public function getCardBank()
    {
        return $this->cardBank;
    }

    public function getAlias()
    {
        return $this->alias;
    }

    public function getCardMonth()
    {
        return $this->cardMonth;
    }

    public function getCardYear()
    {
        return $this->cardYear;
    }
}

?>
