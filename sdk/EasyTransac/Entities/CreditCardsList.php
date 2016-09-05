<?php

namespace EasyTransac\Entities;

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