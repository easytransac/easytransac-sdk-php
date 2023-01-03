<?php

namespace EasyTransac\Entities;

/**
 * Représente les arguments de la requête "Pay by bank" (paiement par virement bancaire).
 * Permet de définir les données nécessaires à la création de cette requête.
 *
 * @copyright EasyTransac
 */
class PayByBank extends Entity
{
    /**
     * Montant à débiter (en centimes).
     *
     * @var int|null
     * @map:Amount
     */
    protected $amount = null;

    /**
     * Adresse IP du client.
     *
     * @var string|null
     * @map:ClientIp
     */
    protected $clientIp = null;

    /**
     * Identifiant de commande associé au paiement.
     *
     * @var string|null
     * @map:OrderId
     */
    protected $orderId = null;

    /**
     * Description de la transaction.
     *
     * @var string|null
     * @map:Description
     */
    protected $description = null;

    /**
     * URL de retour après le paiement.
     *
     * @var string|null
     * @map:ReturnUrl
     */
    protected $returnUrl = null;

    /**
     * Objet client contenant les informations personnelles.
     *
     * @var Customer|null
     * @object:Customer
     */
    protected $customer = null;

    /**
     * Adresse email du destinataire du paiement.
     *
     * @var string|null
     * @map:PayToEmail
     */
    protected $payToEmail = null;

    /**
     * Identifiant du destinataire du paiement.
     *
     * @var string|null
     * @map:PayToId
     */
    protected $payToId = null;

    /**
     * User-Agent du navigateur du client.
     *
     * @var string|null
     * @map:UserAgent
     */
    protected $userAgent = null;

    /**
     * Langue à utiliser pour l'interface de paiement.
     *
     * @var string|null
     * @map:Language
     */
    protected $language = null;

    /**
     * Méthode de retour (éventuellement POST ou GET).
     *
     * @var string|null
     * @map:ReturnMethod
     */
    protected $returnMethod = null;

    /**
     * Définit le montant de la transaction.
     *
     * @param int $amount Montant en centimes
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * Définit la langue de l'interface.
     *
     * @param string $language Code de langue (ex : "fr")
     * @return $this
     */
    public function setLanguage($language)
    {
        $this->language = $language;
        return $this;
    }

    /**
     * Définit l'adresse IP du client.
     *
     * @param string $clientIp
     * @return $this
     */
    public function setClientIp($clientIp)
    {
        $this->clientIp = $clientIp;
        return $this;
    }

    /**
     * Définit l'identifiant de la commande.
     *
     * @param string $orderId
     * @return $this
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
        return $this;
    }

    /**
     * Définit la description du paiement.
     *
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Définit l'URL de retour après le paiement.
     *
     * @param string $returnUrl
     * @return $this
     */
    public function setReturnUrl($returnUrl)
    {
        $this->returnUrl = $returnUrl;
        return $this;
    }

    /**
     * Associe un objet client à la transaction.
     *
     * @param Customer $customer
     * @return $this
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;
        return $this;
    }

    /**
     * Définit l'adresse email du destinataire du paiement.
     *
     * @param string $payToEmail
     * @return $this
     */
    public function setPayToEmail($payToEmail)
    {
        $this->payToEmail = $payToEmail;
        return $this;
    }

    /**
     * Définit l'identifiant du destinataire du paiement.
     *
     * @param string $payToId
     * @return $this
     */
    public function setPayToId($payToId)
    {
        $this->payToId = $payToId;
        return $this;
    }

    /**
     * Définit le User-Agent du navigateur du client.
     *
     * @param string $userAgent
     * @return $this
     */
    public function setUserAgent($userAgent)
    {
        $this->userAgent = $userAgent;
        return $this;
    }

    /**
     * Définit la méthode de retour.
     *
     * @param string $returnMethod
     * @return $this
     */
    public function setReturnMethod($returnMethod)
    {
        $this->returnMethod = $returnMethod;
        return $this;
    }
}
