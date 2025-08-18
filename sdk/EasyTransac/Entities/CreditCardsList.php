<?php

namespace EasyTransac\Entities;

/**
 * Represents a list of credit cards.
 *
 * This entity models the response of a "CreditCardsList" request,
 * containing multiple {@see \EasyTransac\Entities\CreditCard} objects.
 *
 * @package EasyTransac\Entities
 * 
 */
class CreditCardsList extends Entity
{
    /**
     * List of associated credit cards.
     *
     * This is an array of {@see \EasyTransac\Entities\CreditCard} objects.
     *
     * @var CreditCard[]|null
     * @array:CreditCard
     */
    protected $creditCards;

    /**
     * Returns the list of credit cards.
     *
     * @return CreditCard[]|null Array of CreditCard objects, or null if empty.
     */
    public function getCreditCards()
    {
        return $this->creditCards;
    }
}
