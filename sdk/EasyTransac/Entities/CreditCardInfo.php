<?php

namespace EasyTransac\Entities;

/**
 * Represents credit card details.
 *
 * This entity provides enriched information about a card, such as the BIN,
 * issuing country, issuing bank, card type, as well as its expiration date
 * and alias.
 *
 * @package EasyTransac\Entities
 * 
 */
class CreditCardInfo extends Entity
{
    /**
     * Card Bank Identification Number (BIN).
     * Corresponds to the first 6 digits of the card.
     *
     * @var string|null
     * @map:CardBIN
     */
    protected $cardBin = null;

    /**
     * Card issuing country (ISO code, e.g., FR, US).
     *
     * @var string|null
     * @map:CardCountry
     */
    protected $cardCountry = null;

    /**
     * Card type (e.g., Visa, MasterCard, Amex).
     *
     * @var string|null
     * @map:CardType
     */
    protected $cardType = null;

    /**
     * Name of the card’s issuing bank.
     *
     * @var string|null
     * @map:CardBank
     */
    protected $cardBank = null;

    /**
     * Card alias, used for subsequent payments.
     *
     * @var string|null
     * @map:Alias
     */
    protected $alias = null;

    /**
     * Card expiration month (01 to 12).
     *
     * @var string|null
     * @map:CardMonth
     */
    protected $cardMonth = null;

    /**
     * Card expiration year (YYYY format).
     *
     * @var string|null
     * @map:CardYear
     */
    protected $cardYear = null;

    /**
     * Returns the card BIN (Bank Identification Number).
     *
     * @return string|null
     */
    public function getCardBin()
    {
        return $this->cardBin;
    }

    /**
     * Returns the card issuing country.
     *
     * @return string|null
     */
    public function getCardCountry()
    {
        return $this->cardCountry;
    }

    /**
     * Returns the card type (Visa, MasterCard, etc.).
     *
     * @return string|null
     */
    public function getCardType()
    {
        return $this->cardType;
    }

    /**
     * Returns the name of the issuing bank.
     *
     * @return string|null
     */
    public function getCardBank()
    {
        return $this->cardBank;
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
     * Returns the card expiration month.
     *
     * @return string|null
     */
    public function getCardMonth()
    {
        return $this->cardMonth;
    }

    /**
     * Returns the card expiration year.
     *
     * @return string|null
     */
    public function getCardYear()
    {
        return $this->cardYear;
    }
}
