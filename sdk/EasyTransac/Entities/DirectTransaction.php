<?php

namespace EasyTransac\Entities;

/**
 * Représente les paramètres de la requête "DirectPayment".
 *
 * Cette entité permet d’initier un paiement direct en spécifiant
 * les détails de la transaction, du client, de la carte bancaire, etc.
 *
 * @package EasyTransac\Entities
 * @copyright EasyTransac
 */
class DirectTransaction extends Entity
{
    /**
     * Montant de la transaction (en centimes, ex : 1500 = 15.00€).
     *
     * @var int|null
     * @map:Amount
     */
    protected $amount = null;

    /**
     * Identifiant de la commande.
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
     * Adresse IP du client.
     *
     * @var string|null
     * @map:ClientIp
     */
    protected $clientIp = null;

    /**
     * Indique si la transaction doit utiliser le protocole 3D Secure.
     *
     * @var bool|null
     * @map:3DS
     */
    protected $secure = null;

    /**
     * Montant de l'acompte, si applicable.
     *
     * @var int|null
     * @map:DownPayment
     */
    protected $downPayment = null;

    /**
     * URL de retour après le paiement.
     *
     * @var string|null
     * @map:ReturnUrl
     */
    protected $returnUrl = null;

    /**
     * Indique si le paiement se fait en plusieurs fois.
     *
     * @var bool|null
     * @map:MultiplePayments
     */
    protected $multiplePayments = null;

    /**
     * Nombre de fois que le paiement est répété.
     *
     * @var int|null
     * @map:MultiplePaymentsRepeat
     */
    protected $multiplePaymentsRepeat = null;

    /**
     * Active les paiements récurrents.
     *
     * @var bool|null
     * @map:Rebill
     */
    protected $rebill = null;

    /**
     * Fréquence de récurrence (ex : 'monthly', 'weekly').
     *
     * @var string|null
     * @map:Recurrence
     */
    protected $recurrence = null;

    /**
     * Email du destinataire du paiement (paiement entre utilisateurs).
     *
     * @var string|null
     * @map:PayToEmail
     */
    protected $payToEmail = null;

    /**
     * Identifiant EasyTransac du destinataire.
     *
     * @var string|null
     * @map:PayToId
     */
    protected $payToId = null;

    /**
     * User Agent du navigateur utilisé.
     *
     * @var string|null
     * @map:UserAgent
     */
    protected $userAgent = null;

    /**
     * Langue utilisée pour les pages de paiement (ex : 'fr', 'en').
     *
     * @var string|null
     * @map:Language
     */
    protected $language = null;

    /**
     * Données du client effectuant la transaction.
     *
     * @var Customer|null
     * @object:Customer
     */
    protected $customer = null;

    /**
     * Données de la carte bancaire utilisée pour le paiement.
     *
     * @var CreditCard|null
     * @object:CreditCard
     */
    protected $creditCard = null;

    /**
     * Indique si la transaction est une pré-autorisation (sans débit immédiat).
     *
     * @var bool|null
     * @map:PreAuth
     */
    protected $preAuth = null;

    /**
     * Durée de validité d'une pré-autorisation (en jours).
     *
     * @var int|null
     * @map:PreAuthDuration
     */
    protected $preAuthDuration = null;

    /**
     * Indique s’il faut enregistrer la carte pour usage futur.
     *
     * @var bool|null
     * @map:SaveCard
     */
    protected $saveCard = null;

    /**
     * Méthode de retour (GET, POST, ou autre).
     *
     * @var string|null
     * @map:ReturnMethod
     */
    protected $returnMethod = null;

    /**
     * Initialise la transaction et capture l’IP et le User-Agent automatiquement si disponibles.
     */
    public function __construct()
    {
        parent::__construct();

        if (isset($_SERVER['REMOTE_ADDR']) && !empty($_SERVER['REMOTE_ADDR'])) {
            $this->setClientIp($_SERVER['REMOTE_ADDR']);
        }

        if (isset($_SERVER['HTTP_USER_AGENT']) && !empty($_SERVER['HTTP_USER_AGENT'])) {
            $this->setUserAgent($_SERVER['HTTP_USER_AGENT']);
        }
    }

    /**
     * Définit la carte de crédit à utiliser.
     *
     * @param CreditCard $value
     * @return $this
     */
    public function setCreditCard(CreditCard $value)
    {
        $this->creditCard = $value;
        return $this;
    }

    /**
     * Définit le client lié à la transaction.
     *
     * @param Customer $value
     * @return $this
     */
    public function setCustomer(Customer $value)
    {
        $this->customer = $value;
        return $this;
    }

    /**
     * Définit le montant de l'acompte.
     *
     * @param int $value
     * @return $this
     */
    public function setDownPayment($value)
    {
        $this->downPayment = $value;
        return $this;
    }

    /**
     * Active ou désactive le 3D Secure.
     *
     * @param bool $value
     * @return $this
     */
    public function setSecure($value)
    {
        $this->secure = $value;
        return $this;
    }

    /**
     * Définit l’IP client.
     *
     * @param string $value
     * @return $this
     */
    public function setClientIp($value)
    {
        $this->clientIp = $value;
        return $this;
    }

    /**
     * Définit la description de la transaction.
     *
     * @param string $value
     * @return $this
     */
    public function setDescription($value)
    {
        $this->description = $value;
        return $this;
    }

    /**
     * Définit l’identifiant de la commande.
     *
     * @param string $value
     * @return $this
     */
    public function setOrderId($value)
    {
        $this->orderId = $value;
        return $this;
    }

    /**
     * Définit le montant de la transaction.
     *
     * @param int $value
     * @return $this
     */
    public function setAmount($value)
    {
        $this->amount = $value;
        return $this;
    }

    /**
     * Active ou désactive le paiement en plusieurs fois.
     *
     * @param bool $multiplePayments
     * @return $this
     */
    public function setMultiplePayments($multiplePayments)
    {
        $this->multiplePayments = $multiplePayments;
        return $this;
    }

    /**
     * Définit le nombre de répétitions pour un paiement en plusieurs fois.
     *
     * @param int $multiplePaymentsRepeat
     * @return $this
     */
    public function setMultiplePaymentsRepeat($multiplePaymentsRepeat)
    {
        $this->multiplePaymentsRepeat = $multiplePaymentsRepeat;
        return $this;
    }

    /**
     * Active ou désactive les paiements récurrents.
     *
     * @param bool $rebill
     * @return $this
     */
    public function setRebill($rebill)
    {
        $this->rebill = $rebill;
        return $this;
    }

    /**
     * Définit la fréquence de récurrence.
     *
     * @param string $recurrence
     * @return $this
     */
    public function setRecurrence($recurrence)
    {
        $this->recurrence = $recurrence;
        return $this;
    }

    /**
     * Définit l’adresse email du destinataire du paiement.
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
     * Définit l’identifiant du destinataire.
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
     * Définit la langue d'affichage.
     *
     * @param string $language
     * @return $this
     */
    public function setLanguage($language)
    {
        $this->language = $language;
        return $this;
    }

    /**
     * Active ou désactive la pré-autorisation (sans débit immédiat).
     *
     * @param bool $preAuth
     * @return $this
     */
    public function setPreAuth($preAuth)
    {
        $this->preAuth = $preAuth;
        return $this;
    }

    /**
     * Définit la durée de la pré-autorisation (en jours).
     *
     * @param int $preAuthDuration
     * @return $this
     */
    public function setPreAuthDuration($preAuthDuration)
    {
        $this->preAuthDuration = $preAuthDuration;
        return $this;
    }

    /**
     * Définit l’URL de redirection après paiement.
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
     * Indique s’il faut enregistrer la carte pour paiements ultérieurs.
     *
     * @param bool $saveCard
     * @return $this
     */
    public function setSaveCard($saveCard)
    {
        $this->saveCard = $saveCard;
        return $this;
    }

    /**
     * Définit la méthode de retour (GET, POST, etc.).
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
