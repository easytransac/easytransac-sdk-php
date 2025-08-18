<?php

namespace EasyTransac\Entities;

/**
 * Represents the arguments for a "DebitPayment" request.
 *
 * This entity is used to configure the information required for a debit
 * payment, including amount, customer, recurrence, etc.
 *
 * @package EasyTransac\Entities
 * 
 */
class DebitTransaction extends Entity
{
    /**
     * Transaction amount in cents (e.g., 1000 = 10.00).
     *
     * @var int|null
     * @map:Amount
     */
    protected $amount = null;

    /**
     * Order identifier associated with the transaction.
     *
     * @var string|null
     * @map:OrderId
     */
    protected $orderId = null;

    /**
     * Free-form transaction description.
     *
     * @var string|null
     * @map:Description
     */
    protected $description = null;

    /**
     * Client IP address performing the transaction.
     *
     * @var string|null
     * @map:ClientIp
     */
    protected $clientIp = null;

    /**
     * Whether the transaction targets a business customer (B2B).
     *
     * @var bool|null
     * @map:B2B
     */
    protected $b2b = null;

    /**
     * Down payment amount, if applicable (in cents).
     *
     * @var int|null
     * @map:DownPayment
     */
    protected $downPayment = null;

    /**
     * Whether installment payments are requested.
     *
     * @var bool|null
     * @map:MultiplePayments
     */
    protected $multiplePayments = null;

    /**
     * Number of repetitions for installment payments.
     *
     * @var int|null
     * @map:MultiplePaymentsRepeat
     */
    protected $multiplePaymentsRepeat = null;

    /**
     * Enables a recurring payment.
     *
     * @var bool|null
     * @map:Rebill
     */
    protected $rebill = null;

    /**
     * Recurrence frequency if enabled (e.g., 'monthly', 'weekly').
     *
     * @var string|null
     * @map:Recurrence
     */
    protected $recurrence = null;

    /**
     * Recipient email for direct send.
     *
     * @var string|null
     * @map:PayToEmail
     */
    protected $payToEmail = null;

    /**
     * EasyTransac recipient identifier for direct send.
     *
     * @var string|null
     * @map:PayToId
     */
    protected $payToId = null;

    /**
     * Client browser User-Agent.
     *
     * @var string|null
     * @map:UserAgent
     */
    protected $userAgent = null;

    /**
     * Language code for responses (e.g., 'fr', 'en').
     *
     * @var string|null
     * @map:Language
     */
    protected $language = null;

    /**
     * Bank BIC code for SEPA Direct Debit.
     *
     * @var string|null
     * @map:Bic
     */
    protected $bic = null;

    /**
     * Customer IBAN.
     *
     * @var string|null
     * @map:Iban
     */
    protected $iban = null;

    /**
     * Customer information.
     *
     * @var Customer|null
     * @object:Customer
     */
    protected $customer = null;

    /**
     * Account holder name.
     *
     * @var string|null
     * @map:AccountOwner
     */
    protected $accountOwner = null;

    /**
     * Redirect URL after payment.
     *
     * @var string|null
     * @map:ReturnUrl
     */
    protected $returnUrl = null;

    /**
     * International dialing code for SDD.
     *
     * @var string|null
     * @map:SddCallingCode
     */
    protected $sddCallingCode = null;

    /**
     * Phone number for SDD.
     *
     * @var string|null
     * @map:SddPhone
     */
    protected $sddPhone = null;

    /**
     * Constructor that auto-initializes client IP and User-Agent
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
     * Sets the return URL after payment.
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
     * Sets the customer associated with the transaction.
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
     * Sets the account holder name.
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
     * Enables or disables installment payments.
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
     * Sets the client IP address.
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
     * Sets the bank BIC.
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
     * Sets the IBAN.
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
     * Enables or disables B2B mode.
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
     * Enables or disables recurring payment.
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
     * Sets the recipient email.
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
     * Sets the client User-Agent.
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
     * Sets the language code.
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
     * Sets the SDD international dialing code.
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
     * Sets the SDD phone number.
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
