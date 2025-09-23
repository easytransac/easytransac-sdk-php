<?php

namespace EasyTransac\Entities;

/**
 * Represents the parameters for a "DirectPayment" request.
 *
 * This entity is used to initiate a direct payment by specifying
 * transaction, customer, and credit card details, etc.
 *
 * @package EasyTransac\Entities
 *
 */
class DirectTransaction extends Entity
{
    /**
     * Transaction amount in cents (e.g., 1500 = 15.00).
     *
     * @var int|null
     * @map:Amount
     */
    protected $amount = null;

    /**
     * Order identifier.
     *
     * @var string|null
     * @map:OrderId
     */
    protected $orderId = null;

    /**
     * Transaction description.
     *
     * @var string|null
     * @map:Description
     */
    protected $description = null;

    /**
     * Client IP address.
     *
     * @var string|null
     * @map:ClientIp
     */
    protected $clientIp = null;

    /**
     * Whether to use 3D Secure for the transaction.
     *
     * @var bool|null
     * @map:3DS
     */
    protected $secure = null;

    /**
     * Down payment amount, if applicable.
     *
     * @var int|null
     * @map:DownPayment
     */
    protected $downPayment = null;

    /**
     * Redirect URL after payment.
     *
     * @var string|null
     * @map:ReturnUrl
     */
    protected $returnUrl = null;

    /**
     * Whether the payment is split into installments.
     *
     * @var bool|null
     * @map:MultiplePayments
     */
    protected $multiplePayments = null;

    /**
     * Number of installment repetitions.
     *
     * @var int|null
     * @map:MultiplePaymentsRepeat
     */
    protected $multiplePaymentsRepeat = null;

    /**
     * Enables recurring payments.
     *
     * @var bool|null
     * @map:Rebill
     */
    protected $rebill = null;

    /**
     * Recurrence frequency (e.g., 'monthly', 'weekly').
     *
     * @var string|null
     * @map:Recurrence
     */
    protected $recurrence = null;

    /**
     * Recipient email (peer-to-peer payments).
     *
     * @var string|null
     * @map:PayToEmail
     */
    protected $payToEmail = null;

    /**
     * EasyTransac recipient identifier.
     *
     * @var string|null
     * @map:PayToId
     */
    protected $payToId = null;

    /**
     * Browser User-Agent.
     *
     * @var string|null
     * @map:UserAgent
     */
    protected $userAgent = null;

    /**
     * Language used for the payment pages (e.g., 'fr', 'en').
     *
     * @var string|null
     * @map:Language
     */
    protected $language = null;

    /**
     * Customer data for the transaction.
     *
     * @var Customer|null
     * @object:Customer
     */
    protected $customer = null;

    /**
     * Credit card data used for payment.
     *
     * @var CreditCard|null
     * @object:CreditCard
     */
    protected $creditCard = null;

    /**
     * Indicates a pre-authorization (no immediate capture).
     *
     * @var bool|null
     * @map:PreAuth
     */
    protected $preAuth = null;

    /**
     * Pre-authorization validity period (in days).
     *
     * @var int|null
     * @map:PreAuthDuration
     */
    protected $preAuthDuration = null;

    /**
     * Whether to save the card for future use.
     *
     * @var bool|null
     * @map:SaveCard
     */
    protected $saveCard = null;

    /**
     * Return method (GET, POST, etc.).
     *
     * @var string|null
     * @map:ReturnMethod
     */
    protected $returnMethod = null;

    /**
     * Initializes the transaction and auto-captures client IP and User-Agent
     * from HTTP headers when available.
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
     * Sets the credit card to use.
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
     * Sets the customer linked to the transaction.
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
     * Sets the down payment amount.
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
     * Enables or disables 3D Secure.
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
     * Sets the client IP.
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
     * Sets the transaction description.
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
     * Sets the order identifier.
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
     * Sets the transaction amount.
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
     * Enables or disables installment payments.
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
     * Sets the number of repetitions for installment payments.
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
     * Enables or disables recurring payments.
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
     * Sets the recurrence frequency.
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
     * Sets the recipient email for the payment.
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
     * Sets the recipient identifier.
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
     * Sets the client's browser User-Agent.
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
     * Sets the display language.
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
     * Enables or disables pre-authorization (no immediate capture).
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
     * Sets the pre-authorization duration (in days).
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
     * Sets the redirect URL after payment.
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
     * Indicates whether the card should be saved for future payments.
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
     * Sets the return method (GET, POST, etc.).
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
