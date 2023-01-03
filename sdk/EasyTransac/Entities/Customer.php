<?php

namespace EasyTransac\Entities;

/**
 * Représente un client de la plateforme EasyTransac.
 *
 * Cette entité contient les informations personnelles, professionnelles
 * et bancaires d'un client, utilisées dans le cadre des transactions.
 *
 * @package EasyTransac\Entities
 * @copyright EasyTransac
 */
class Customer extends Entity
{
    /**
     * Identifiant interne du client.
     *
     * @var string|null
     * @map:Id
     */
    protected $id = null;

    /**
     * Adresse email du client.
     *
     * @var string|null
     * @map:Email
     */
    protected $email = null;

    /**
     * Prénom du client.
     *
     * @var string|null
     * @map:Firstname
     */
    protected $firstname = null;

    /**
     * Nom de famille du client.
     *
     * @var string|null
     * @map:Lastname
     */
    protected $lastname = null;

    /**
     * Indicatif téléphonique international (ex : +33).
     *
     * @var string|null
     * @map:CallingCode
     */
    protected $callingCode = null;

    /**
     * Numéro de téléphone du client.
     *
     * @var string|null
     * @map:Phone
     */
    protected $phone = null;

    /**
     * Date de naissance du client (format YYYY-MM-DD).
     *
     * @var string|null
     * @map:BirthDate
     */
    protected $birthDate = null;

    /**
     * Nationalité du client (code pays ISO).
     *
     * @var string|null
     * @map:Nationality
     */
    protected $nationality = null;

    /**
     * Adresse postale du client.
     *
     * @var string|null
     * @map:Address
     */
    protected $address = null;

    /**
     * Code postal.
     *
     * @var string|null
     * @map:ZipCode
     */
    protected $zipCode = null;

    /**
     * Ville.
     *
     * @var string|null
     * @map:City
     */
    protected $city = null;

    /**
     * Pays (code ISO, ex : FR, BE).
     *
     * @var string|null
     * @map:Country
     */
    protected $country = null;

    /**
     * UID interne (identifiant unique généré).
     *
     * @var string|null
     * @map:Uid
     */
    protected $uid = null;

    /**
     * Identifiant client dans l’environnement partenaire.
     *
     * @var string|null
     * @map:ClientId
     */
    protected $clientId = null;

    /**
     * Nom de la société du client (si personne morale).
     *
     * @var string|null
     * @map:Company
     */
    protected $company = null;

    /**
     * IBAN du compte bancaire du client.
     *
     * @var string|null
     * @map:Iban
     */
    protected $iban = null;

    /**
     * Code BIC/SWIFT de la banque du client.
     *
     * @var string|null
     * @map:Bic
     */
    protected $bic = null;

    /**
     * Message personnalisé ou champ de communication.
     *
     * @var string|null
     * @map:Communication
     */
    protected $communication = null;

    /**
     * Date de création du client (format YYYY-MM-DD).
     *
     * @var string|null
     * @map:CreationDate
     */
    protected $creationDate = null;

    /**
     * Retourne la date de création du client.
     *
     * @return string|null
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Définit l'UID du client.
     *
     * @param string $value
     * @return $this
     */
    public function setUid($value)
    {
        $this->uid = $value;
        return $this;
    }

    /**
     * Retourne l'ID interne du client.
     *
     * @return string|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Définit l'ID interne du client.
     *
     * @param string $value
     * @return $this
     */
    public function setId($value)
    {
        $this->id = $value;
        return $this;
    }

    /**
     * Retourne l'UID du client.
     *
     * @return string|null
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Définit la ville du client.
     *
     * @param string $value
     * @return $this
     */
    public function setCity($value)
    {
        $this->city = $value;
        return $this;
    }

    /**
     * Retourne la ville du client.
     *
     * @return string|null
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Définit le code postal.
     *
     * @param string $value
     * @return $this
     */
    public function setZipCode($value)
    {
        $this->zipCode = $value;
        return $this;
    }

    /**
     * Retourne le code postal.
     *
     * @return string|null
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * Définit l'adresse postale.
     *
     * @param string $value
     * @return $this
     */
    public function setAddress($value)
    {
        $this->address = $value;
        return $this;
    }

    /**
     * Retourne le pays.
     *
     * @return string|null
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Retourne l'adresse postale.
     *
     * @return string|null
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Définit la nationalité.
     *
     * @param string $value
     * @return $this
     */
    public function setNationality($value)
    {
        $this->nationality = $value;
        return $this;
    }

    /**
     * Retourne la nationalité.
     *
     * @return string|null
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * Définit la date de naissance.
     *
     * @param string $value Format YYYY-MM-DD
     * @return $this
     */
    public function setBirthDate($value)
    {
        $this->birthDate = $value;
        return $this;
    }

    /**
     * Retourne la date de naissance.
     *
     * @return string|null
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * Définit le numéro de téléphone.
     *
     * @param string $value
     * @return $this
     */
    public function setPhone($value)
    {
        $this->phone = $value;
        return $this;
    }

    /**
     * Retourne le numéro de téléphone.
     *
     * @return string|null
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Définit l’indicatif téléphonique international.
     *
     * @param string $value
     * @return $this
     */
    public function setCallingCode($value)
    {
        $this->callingCode = $value;
        return $this;
    }

    /**
     * Retourne l’indicatif téléphonique international.
     *
     * @return string|null
     */
    public function getCallingCode()
    {
        return $this->callingCode;
    }

    /**
     * Définit le nom de famille.
     *
     * @param string $value
     * @return $this
     */
    public function setLastname($value)
    {
        $this->lastname = $value;
        return $this;
    }

    /**
     * Définit le pays.
     *
     * @param string $value
     * @return $this
     */
    public function setCountry($value)
    {
        $this->country = $value;
        return $this;
    }

    /**
     * Retourne le nom de famille.
     *
     * @return string|null
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Définit le prénom.
     *
     * @param string $value
     * @return $this
     */
    public function setFirstname($value)
    {
        $this->firstname = $value;
        return $this;
    }

    /**
     * Retourne le prénom.
     *
     * @return string|null
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Définit l'adresse email.
     *
     * @param string $value
     * @return $this
     */
    public function setEmail($value)
    {
        $this->email = $value;
        return $this;
    }

    /**
     * Retourne l'adresse email.
     *
     * @return string|null
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Retourne l'identifiant client côté partenaire.
     *
     * @return string|null
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * Définit l'identifiant client côté partenaire.
     *
     * @param string $clientId
     * @return $this
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
        return $this;
    }

    /**
     * Retourne le nom de la société.
     *
     * @return string|null
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Retourne l'IBAN.
     *
     * @return string|null
     */
    public function getIban()
    {
        return $this->iban;
    }

    /**
     * Retourne le code BIC.
     *
     * @return string|null
     */
    public function getBic()
    {
        return $this->bic;
    }

    /**
     * Retourne le message ou champ de communication.
     *
     * @return string|null
     */
    public function getCommunication()
    {
        return $this->communication;
    }

    /**
     * Définit le nom de la société.
     *
     * @param string $company
     * @return $this
     */
    public function setCompany($company)
    {
        $this->company = $company;
        return $this;
    }

    /**
     * Définit l'IBAN.
     *
     * @param string $iban
     * @return $this
     */
    public function setIban($iban)
    {
        $this->iban = $iban;
        return $this;
    }

    /**
     * Définit le BIC.
     *
     * @param string $bic
     * @return $this
     */
    public function setBic($bic)
    {
        $this->bic = $bic;
        return $this;
    }

    /**
     * Définit le message de communication.
     *
     * @param string $communication
     * @return $this
     */
    public function setCommunication($communication)
    {
        $this->communication = $communication;
        return $this;
    }
}
