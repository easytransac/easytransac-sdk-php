<?php

namespace EasyTransac\Entities;

/**
 * Represents a credit cards list (response of AddCreditCard and CreditCardsList requests)
 * @author klyde
 * @copyright EasyTransac
 */
class CreditCardsList extends Entity
{
    /** @array:CreditCard **/
    protected $creditCards;

    public function getCreditCards()
    {
        return $this->creditCards;
    }

    public function setCreditCards(array $creditCards)
    {
        $this->creditCards = $creditCards;
        return $this;
    }

}

?>