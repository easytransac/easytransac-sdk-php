<?php

namespace EasyTransac\Entities;

/**
 * Represents a credit cards list (response of CreditCardsList request)
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
}
