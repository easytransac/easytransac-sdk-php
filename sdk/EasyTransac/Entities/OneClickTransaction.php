<?php

namespace EasyTransac\Entities;

/**
 * Represents the arguments for the "OneClickPayment" request.
 *
 * This entity is used to perform a transaction using a stored card (one-click payment).
 * It contains all the information required to create a OneClick request.
 */
class OneClickTransaction extends Entity
{
    /**
     * Transaction amount (in cents).
     * @var int|null
     * @map:Amount
     */
    protected $amount = null;

    /**
     * Customer unique identifier (UID).
     * @var string|null
     * @map:Uid
     */
    protected $uid = null;

    /**
     * Order identifier.
     * @var string|null
     * @map:OrderId
     */
    protected $orderId = null;

    /**
     * Transaction description.
     * @var string|null
     * @map:Description
     */
    protected $description = null;

    /**
     * Client IP address.
     * @var string|null
     * @map:ClientIp
     */
    protected $clientIp = null;

    /**
     * Stored card alias.
     * @var string|null
     * @map:Alias
     */
    protected $alias = null;

    /**
     * Recipient email address.
     * @var string|null
     * @map:PayToEmail
     */
    protected $payToEmail = null;

    /**
     * Recipient (merchant) identifier.
     * @var string|null
     * @map:PayToId
     */
    protected $payToId = null;

    /**
     * User’s browser User-Agent.
     * @var string|null
     * @map:UserAgent
     */
    protected $userAgent = null;

    /**
     * User language.
     * @var string|null
     * @map:Language
     */
    protected $language = null;

    /**
     * Merchant-side customer identifier.
     * @var string|null
     * @map:ClientId
     */
    protected $clientId = null;

    /**
     * Whether to secure the payment with 3D Secure.
     * @var bool|null
     * @map:3DS
     */
    protected $secure = null;

    /**
     * Return URL after payment.
     * @var string|null
     * @map:ReturnUrl
     */
    protected $returnUrl = null;

    /**
     * Card security code (CVV).
     * @var string|null
     * @map:CardCVV
     */
    protected $CVV = null;

    /**
     * Indicates whether the transaction is a pre-authorization.
     * @var bool|null
     * @map:PreAuth
     */
    protected $preAuth = null;

    /**
     * Pre-authorization validity period (in days).
     * @var int|null
     * @map:PreAuthDuration
     */
    protected $preAuthDuration = null;

    /**
     * Constructor: auto-initializes IP and User-Agent when available.
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
     * @param string $value Stored card alias
     * @return $this
     */
    public function setAlias($value)
    {
        $this->alias = $value;
        return $this;
    }

    /**
     * @param string $value Client IP address
     * @return $this
     */
    public function setClientIp($value)
    {
        $this->clientIp = $value;
        return $this;
    }

    /**
     * @param string $value Transaction description
     * @return $this
     */
    public function setDescription($value)
    {
        $this->description = $value;
        return $this;
    }

    /**
     * @param string $value Order identifier
     * @return $this
     */
    public function setOrderId($value)
    {
        $this->orderId = $value;
        return $this;
    }

    /**
     * @param string $value Customer UID
     * @return $this
     */
    public function setUid($value)
    {
        $this->uid = $value;
        return $this;
    }

    /**
     * @param int $value Transaction amount in cents
     * @return $this
     */
    public function setAmount($value)
    {
        $this->amount = $value;
        return $this;
    }

    /**
     * @param string $payToEmail Recipient email
     * @return $this
     */
    public function setPayToEmail($payToEmail)
    {
        $this->payToEmail = $payToEmail;
        return $this;
    }

    /**
     * @param string $payToId Recipient identifier
     * @return $this
     */
    public function setPayToId($payToId)
    {
        $this->payToId = $payToId;
        return $this;
    }

    /**
     * @param string $userAgent Browser User-Agent
     * @return $this
     */
    public function setUserAgent($userAgent)
    {
        $this->userAgent = $userAgent;
        return $this;
    }

    /**
     * @param string $language Language used
     * @return $this
     */
    public function setLanguage($language)
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @param string $clientId Merchant-side client identifier
     * @return $this
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
        return $this;
    }

    /**
     * @param bool $secure Enable 3D Secure
     * @return $this
     */
    public function setSecure($secure)
    {
        $this->secure = $secure;
        return $this;
    }

    /**
     * @param string $returnUrl Return URL after payment
     * @return $this
     */
    public function setReturnUrl($returnUrl)
    {
        $this->returnUrl = $returnUrl;
        return $this;
    }

    /**
     * @param string $cvv Card security code (CVV)
     * @return $this
     */
    public function setCVV($cvv)
    {
        $this->CVV = $cvv;
        return $this;
    }

    /**
     * @param bool $preAuth Pre-authorization mode
     * @return $this
     */
    public function setPreAuth($preAuth)
    {
        $this->preAuth = $preAuth;
        return $this;
    }

    /**
     * @param int $preAuthDuration Pre-authorization duration (days)
     * @return $this
     */
    public function setPreAuthDuration($preAuthDuration)
    {
        $this->preAuthDuration = $preAuthDuration;
        return $this;
    }
}
