<?php

namespace EasyTransac\Entities;

/**
 * Représente les arguments de la requête "OneClickPayment"
 *
 * Cette entité est utilisée pour effectuer une transaction par carte bancaire enregistrée (paiement en un clic).
 * Elle contient toutes les informations nécessaires à la création d'une requête OneClick.
 *
 * @copyright EasyTransac
 */
class OneClickTransaction extends Entity
{
    /**
     * Montant de la transaction (en centimes).
     * @var int|null
     * @map:Amount
     */
    protected $amount = null;

    /**
     * Identifiant unique du client (UID).
     * @var string|null
     * @map:Uid
     */
    protected $uid = null;

    /**
     * Identifiant de la commande.
     * @var string|null
     * @map:OrderId
     */
    protected $orderId = null;

    /**
     * Description de la transaction.
     * @var string|null
     * @map:Description
     */
    protected $description = null;

    /**
     * Adresse IP du client.
     * @var string|null
     * @map:ClientIp
     */
    protected $clientIp = null;

    /**
     * Alias de la carte enregistrée.
     * @var string|null
     * @map:Alias
     */
    protected $alias = null;

    /**
     * Adresse email du destinataire du paiement.
     * @var string|null
     * @map:PayToEmail
     */
    protected $payToEmail = null;

    /**
     * Identifiant du commerçant destinataire du paiement.
     * @var string|null
     * @map:PayToId
     */
    protected $payToId = null;

    /**
     * User-Agent du navigateur de l'utilisateur.
     * @var string|null
     * @map:UserAgent
     */
    protected $userAgent = null;

    /**
     * Langue de l'utilisateur.
     * @var string|null
     * @map:Language
     */
    protected $language = null;

    /**
     * Identifiant client fourni par le commerçant.
     * @var string|null
     * @map:ClientId
     */
    protected $clientId = null;

    /**
     * Indique si le paiement doit être sécurisé avec 3D Secure.
     * @var bool|null
     * @map:3DS
     */
    protected $secure = null;

    /**
     * URL de retour après le paiement.
     * @var string|null
     * @map:ReturnUrl
     */
    protected $returnUrl = null;

    /**
     * Code de sécurité CVV de la carte.
     * @var string|null
     * @map:CardCVV
     */
    protected $CVV = null;

    /**
     * Indique si la transaction est une pré-autorisation.
     * @var bool|null
     * @map:PreAuth
     */
    protected $preAuth = null;

    /**
     * Durée de validité de la pré-autorisation (en jours).
     * @var int|null
     * @map:PreAuthDuration
     */
    protected $preAuthDuration = null;

    /**
     * Constructeur : initialise automatiquement l'IP et le user-agent si disponibles.
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
     * @param string $value Alias de la carte enregistrée
     * @return $this
     */
    public function setAlias($value)
    {
        $this->alias = $value;
        return $this;
    }

    /**
     * @param string $value Adresse IP du client
     * @return $this
     */
    public function setClientIp($value)
    {
        $this->clientIp = $value;
        return $this;
    }

    /**
     * @param string $value Description de la transaction
     * @return $this
     */
    public function setDescription($value)
    {
        $this->description = $value;
        return $this;
    }

    /**
     * @param string $value Identifiant de la commande
     * @return $this
     */
    public function setOrderId($value)
    {
        $this->orderId = $value;
        return $this;
    }

    /**
     * @param string $value UID du client
     * @return $this
     */
    public function setUid($value)
    {
        $this->uid = $value;
        return $this;
    }

    /**
     * @param int $value Montant de la transaction en centimes
     * @return $this
     */
    public function setAmount($value)
    {
        $this->amount = $value;
        return $this;
    }

    /**
     * @param string $payToEmail Email du destinataire
     * @return $this
     */
    public function setPayToEmail($payToEmail)
    {
        $this->payToEmail = $payToEmail;
        return $this;
    }

    /**
     * @param string $payToId Identifiant du destinataire
     * @return $this
     */
    public function setPayToId($payToId)
    {
        $this->payToId = $payToId;
        return $this;
    }

    /**
     * @param string $userAgent User-Agent du navigateur
     * @return $this
     */
    public function setUserAgent($userAgent)
    {
        $this->userAgent = $userAgent;
        return $this;
    }

    /**
     * @param string $language Langue utilisée
     * @return $this
     */
    public function setLanguage($language)
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @param string $clientId Identifiant du client
     * @return $this
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
        return $this;
    }

    /**
     * @param bool $secure Activation de 3D Secure
     * @return $this
     */
    public function setSecure($secure)
    {
        $this->secure = $secure;
        return $this;
    }

    /**
     * @param string $returnUrl URL de retour après paiement
     * @return $this
     */
    public function setReturnUrl($returnUrl)
    {
        $this->returnUrl = $returnUrl;
        return $this;
    }

    /**
     * @param string $cvv Code de sécurité CVV
     * @return $this
     */
    public function setCVV($cvv)
    {
        $this->CVV = $cvv;
        return $this;
    }

    /**
     * @param bool $preAuth Mode pré-autorisation
     * @return $this
     */
    public function setPreAuth($preAuth)
    {
        $this->preAuth = $preAuth;
        return $this;
    }

    /**
     * @param int $preAuthDuration Durée de la pré-autorisation (jours)
     * @return $this
     */
    public function setPreAuthDuration($preAuthDuration)
    {
        $this->preAuthDuration = $preAuthDuration;
        return $this;
    }
}