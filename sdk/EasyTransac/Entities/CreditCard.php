<?php

namespace EasyTransac\Entities;

/**
 * Représente une carte bancaire.
 *
 * Cette entité contient les informations d’une carte de crédit nécessaires
 * aux transactions, comme le numéro, la date d'expiration, le CVV, etc.
 *
 * @package EasyTransac\Entities
 * @copyright EasyTransac
 */
class CreditCard extends Entity
{
    /**
     * Numéro de la carte bancaire (PAN).
     *
     * @var string|null
     * @map:CardNumber
     */
    protected $number = null;

    /**
     * Mois d'expiration de la carte (au format numérique, ex : 01 à 12).
     *
     * @var string|null
     * @map:CardMonth
     */
    protected $month = null;

    /**
     * Année d'expiration de la carte (format à 4 chiffres).
     *
     * @var string|null
     * @map:CardYear
     */
    protected $year = null;

    /**
     * Code de sécurité (CVV/CVC) situé au dos de la carte.
     *
     * @var string|null
     * @map:CardCVV
     */
    protected $CVV = null;

    /**
     * Nom du titulaire de la carte.
     *
     * @var string|null
     * @map:CardOwner
     */
    protected $owner = null;

    /**
     * Alias de la carte (identifiant interne pour usage futur).
     *
     * @var string|null
     * @map:Alias
     */
    protected $alias = null;

    /**
     * Identifiant du client auquel est liée la carte.
     *
     * @var string|null
     * @map:ClientId
     */
    protected $clientId = null;

    /**
     * Type de carte (ex : Visa, MasterCard).
     *
     * @var string|null
     * @map:CardType
     */
    protected $type = null;

    /**
     * Pays d'émission de la carte (code ISO, ex : FR, US).
     *
     * @var string|null
     * @map:CardCountry
     */
    protected $country = null;

    /**
     * Date du dernier accès ou de la dernière utilisation de la carte.
     *
     * @var string|null
     * @map:LastAccessed
     */
    protected $lastAccessed = null;

    /**
     * Indique si la carte a été vérifiée.
     *
     * @var string|null
     * @map:Verified
     */
    protected $verified = null;

    /**
     * Statut de la carte (active, expirée, etc.).
     *
     * @var string|null
     * @map:Status
     */
    protected $status = null;

    /**
     * Retourne la date du dernier accès à la carte.
     *
     * @return string|null
     */
    public function getLastAccessed()
    {
        return $this->lastAccessed;
    }

    /**
     * Retourne si la carte est vérifiée.
     *
     * @return string|null
     */
    public function getVerified()
    {
        return $this->verified;
    }

    /**
     * Retourne le statut de la carte.
     *
     * @return string|null
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Retourne le pays d’émission de la carte.
     *
     * @return string|null
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Retourne le type de carte (Visa, MasterCard, etc.).
     *
     * @return string|null
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Définit l'alias de la carte.
     *
     * @param string $value Alias de la carte.
     * @return $this
     */
    public function setAlias($value)
    {
        $this->alias = $value;
        return $this;
    }

    /**
     * Retourne l'alias de la carte.
     *
     * @return string|null
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * Définit l'identifiant du client.
     *
     * @param string $value Identifiant client.
     * @return $this
     */
    public function setClientId($value)
    {
        $this->clientId = $value;
        return $this;
    }

    /**
     * Retourne l'identifiant du client.
     *
     * @return string|null
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * Définit le nom du titulaire de la carte.
     *
     * @param string $value Nom du titulaire.
     * @return $this
     */
    public function setOwner($value)
    {
        $this->owner = $value;
        return $this;
    }

    /**
     * Retourne le nom du titulaire de la carte.
     *
     * @return string|null
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Définit le code CVV de la carte.
     *
     * @param string $value CVV (code de sécurité).
     * @return $this
     */
    public function setCVV($value)
    {
        $this->CVV = $value;
        return $this;
    }

    /**
     * Retourne le code CVV de la carte.
     *
     * @return string|null
     */
    public function getCVV()
    {
        return $this->CVV;
    }

    /**
     * Définit l'année d’expiration de la carte.
     *
     * @param string $value Année (format YYYY).
     * @return $this
     */
    public function setYear($value)
    {
        $this->year = $value;
        return $this;
    }

    /**
     * Retourne l’année d’expiration de la carte.
     *
     * @return string|null
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Définit le mois d’expiration de la carte.
     *
     * @param string $value Mois (01 à 12).
     * @return $this
     */
    public function setMonth($value)
    {
        $this->month = $value;
        return $this;
    }

    /**
     * Retourne le mois d’expiration de la carte.
     *
     * @return string|null
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * Définit le numéro de carte bancaire.
     *
     * @param string $value Numéro de carte.
     * @return $this
     */
    public function setNumber($value)
    {
        $this->number = $value;
        return $this;
    }

    /**
     * Retourne le numéro de carte bancaire.
     *
     * @return string|null
     */
    public function getNumber()
    {
        return $this->number;
    }
}
