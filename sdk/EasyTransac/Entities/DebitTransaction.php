<?php

namespace EasyTransac\Entities;

/**
 * Représente les arguments de la requête "DebitPayment".
 *
 * Cette entité est utilisée pour configurer les informations nécessaires
 * à un paiement par débit, incluant montant, client, récurrence, etc.
 *
 * @package EasyTransac\Entities
 * @copyright EasyTransac
 */
class DebitTransaction extends Entity
{
    /**
     * Montant de la transaction (en centimes, ex : 1000 = 10.00€).
     *
     * @var int|null
     * @map:Amount
     */
    protected $amount = null;

    /**
     * Identifiant de commande associé à la transaction.
     *
     * @var string|null
     * @map:OrderId
     */
    protected $orderId = null;

    /**
     * Description libre de la transaction.
     *
     * @var string|null
     * @map:Description
     */
    protected $description = null;

    /**
     * Adresse IP du client effectuant la transaction.
     *
     * @var string|null
     * @map:ClientIp
     */
    protected $clientIp = null;

    /**
     * Indique si la transaction est destinée à un client professionnel (B2B).
     *
     * @var bool|null
     * @map:B2B
     */
    protected $b2b = null;

    /**
     * Montant de l'acompte si applicable (en centimes).
     *
     * @var int|null
     * @map:DownPayment
     */
    protected $downPayment = null;

    /**
     * Indique si un paiement en plusieurs fois est demandé.
     *
     * @var bool|null
     * @map:MultiplePayments
     */
    protected $multiplePayments = null;

    /**
     * Nombre de répétitions du paiement multiple.
     *
     * @var int|null
     * @map:MultiplePaymentsRepeat
     */
    protected $multiplePaymentsRepeat = null;

    /**
     * Active un paiement récurrent.
     *
     * @var bool|null
     * @map:Rebill
     */
    protected $rebill = null;

    /**
     * Fréquence de récurrence si active (ex : 'monthly', 'weekly').
     *
     * @var string|null
     * @map:Recurrence
     */
    protected $recurrence = null;

    /**
     * Adresse email du destinataire du paiement (si envoi direct).
     *
     * @var string|null
     * @map:PayToEmail
     */
    protected $payToEmail = null;

    /**
     * Identifiant EasyTransac du destinataire (si envoi direct).
     *
     * @var string|null
     * @map:PayToId
     */
    protected $payToId = null;

    /**
     * User Agent du navigateur du client.
     *
     * @var string|null
     * @map:UserAgent
     */
    protected $userAgent = null;

    /**
     * Code de langue (ex : 'fr', 'en') pour les retours.
     *
     * @var string|null
     * @map:Language
     */
    protected $language = null;

    /**
     * Code BIC de la banque pour prélèvement SEPA.
     *
     * @var string|null
     * @map:Bic
     */
    protected $bic = null;

    /**
     * Numéro IBAN du client.
     *
     * @var string|null
     * @map:Iban
     */
    protected $iban = null;

    /**
     * Informations sur le client.
     *
     * @var Customer|null
     * @object:Customer
     */
    protected $customer = null;

    /**
     * Nom du titulaire du compte bancaire.
     *
     * @var string|null
     * @map:AccountOwner
     */
    protected $accountOwner = null;

    /**
     * URL de redirection après paiement.
     *
     * @var string|null
     * @map:ReturnUrl
     */
    protected $returnUrl = null;

    /**
     * Indicatif téléphonique international pour SDD.
     *
     * @var string|null
     * @map:SddCallingCode
     */
    protected $sddCallingCode = null;

    /**
     * Numéro de téléphone pour SDD.
     *
     * @var string|null
     * @map:SddPhone
     */
    protected $sddPhone = null;

    /**
     * Constructeur qui initialise automatiquement l’IP client
     * et le User-Agent à partir des en-têtes HTTP si disponibles.
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
     * Définit l’URL de retour après paiement.
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
     * Définit le client associé à la transaction.
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
     * Définit le nom du titulaire du compte.
     *
     * @param string $value
     * @return $this
     */
    public function setAccountOwner($value)
    {
        $this->accountOwner = $value;
        return $this;
    }

    /**
     * Active ou désactive le paiement en plusieurs fois.
     *
     * @param bool $value
     * @return $this
     */
    public function setMultiplePayments($value)
    {
        $this->multiplePayments = $value;
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
     * Définit l’adresse IP du client.
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
     * Définit l’identifiant de commande.
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
     * Définit le BIC bancaire.
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
     * Définit l’IBAN.
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
     * Active ou désactive le mode B2B.
     *
     * @param bool $b2b
     * @return $this
     */
    public function setB2B($b2b)
    {
        $this->b2b = $b2b;
        return $this;
    }

    /**
     * Définit le nombre de répétitions pour le paiement multiple.
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
     * Active ou désactive le paiement récurrent.
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
     * Définit l'adresse email du destinataire.
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
     * Définit l'identifiant du destinataire.
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
     * Définit le User-Agent du client.
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
     * Définit le code de langue.
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
     * Définit l’indicatif téléphonique SDD.
     *
     * @param string $sddCallingCode
     * @return $this
     */
    public function setSddCallingCode($sddCallingCode)
    {
        $this->sddCallingCode = $sddCallingCode;
        return $this;
    }

    /**
     * Définit le numéro de téléphone SDD.
     *
     * @param string $sddPhone
     * @return $this
     */
    public function setSddPhone($sddPhone)
    {
        $this->sddPhone = $sddPhone;
        return $this;
    }
}
