<?php

namespace EasyTransac\Entities;

/**
 * Représente les détails d'une carte bancaire.
 *
 * Cette entité fournit des informations enrichies sur une carte,
 * telles que le BIN, le pays, la banque émettrice, le type de carte,
 * ainsi que sa date d’expiration et son alias.
 *
 * @package EasyTransac\Entities
 * @copyright EasyTransac
 */
class CreditCardInfo extends Entity
{
    /**
     * Bank Identification Number (BIN) de la carte.
     * Correspond aux 6 premiers chiffres de la carte.
     *
     * @var string|null
     * @map:CardBIN
     */
    protected $cardBin = null;

    /**
     * Pays d’émission de la carte (code ISO, ex : FR, US).
     *
     * @var string|null
     * @map:CardCountry
     */
    protected $cardCountry = null;

    /**
     * Type de carte (ex : Visa, MasterCard, Amex).
     *
     * @var string|null
     * @map:CardType
     */
    protected $cardType = null;

    /**
     * Nom de la banque émettrice de la carte.
     *
     * @var string|null
     * @map:CardBank
     */
    protected $cardBank = null;

    /**
     * Alias de la carte, utilisé pour des paiements ultérieurs.
     *
     * @var string|null
     * @map:Alias
     */
    protected $alias = null;

    /**
     * Mois d’expiration de la carte (01 à 12).
     *
     * @var string|null
     * @map:CardMonth
     */
    protected $cardMonth = null;

    /**
     * Année d’expiration de la carte (format YYYY).
     *
     * @var string|null
     * @map:CardYear
     */
    protected $cardYear = null;

    /**
     * Retourne le BIN (Bank Identification Number) de la carte.
     *
     * @return string|null
     */
    public function getCardBin()
    {
        return $this->cardBin;
    }

    /**
     * Retourne le pays d’émission de la carte.
     *
     * @return string|null
     */
    public function getCardCountry()
    {
        return $this->cardCountry;
    }

    /**
     * Retourne le type de la carte (Visa, MasterCard, etc.).
     *
     * @return string|null
     */
    public function getCardType()
    {
        return $this->cardType;
    }

    /**
     * Retourne le nom de la banque émettrice de la carte.
     *
     * @return string|null
     */
    public function getCardBank()
    {
        return $this->cardBank;
    }

    /**
     * Retourne l’alias de la carte.
     *
     * @return string|null
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * Retourne le mois d’expiration de la carte.
     *
     * @return string|null
     */
    public function getCardMonth()
    {
        return $this->cardMonth;
    }

    /**
     * Retourne l’année d’expiration de la carte.
     *
     * @return string|null
     */
    public function getCardYear()
    {
        return $this->cardYear;
    }
}
