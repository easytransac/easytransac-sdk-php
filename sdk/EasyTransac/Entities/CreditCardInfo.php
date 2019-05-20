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

    public function setCardBin($cardBIN)
    {
        $this->cardBin = $cardBIN;
        return $this;
    }

    public function setCardCountry($cardCountry)
    {
        $this->cardCountry = $cardCountry;
        return $this;
    }

    public function setCardType($cardType)
    {
        $this->cardType = $cardType;
        return $this;
    }

    public function setCardBank($cardBank)
    {
        $this->cardBank = $cardBank;
        return $this;
    }
}

?>
