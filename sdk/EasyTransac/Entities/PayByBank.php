<?php

namespace EasyTransac\Entities;

/**
 * Represents the parameters for a "Pay by bank" request (bank transfer payment).
 * Allows defining the data required to create this request.
 *
 * @package EasyTransac\Entities
 *
 */
class PayByBank extends Entity
{
    /**
     * Amount to debit (in cents).
     *
     * @var int|null
     * @map:Amount
     */
    protected $amount = null;

    /**
     * Client IP address.
     *
     * @var string|null
     * @map:ClientIp
     */
    protected $clientIp = null;

    /**
     * Order identifier associated with the payment.
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
     * Return URL after payment.
     *
     * @var string|null
     * @map:ReturnUrl
     */
    protected $returnUrl = null;

    /**
     * Customer object containing personal information.
     *
     * @var Customer|null
     * @object:Customer
     */
    protected $customer = null;

    /**
     * Recipient email address.
     *
     * @var string|null
     * @map:PayToEmail
     */
    protected $payToEmail = null;

    /**
     * Recipient identifier.
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
     * Language to use for the payment interface.
     *
     * @var string|null
     * @map:Language
     */
    protected $language = null;

    /**
     * Return method (e.g., POST or GET).
     *
     * @var string|null
     * @map:ReturnMethod
     */
    protected $returnMethod = null;

    /**
     * Sets the transaction amount.
     *
     * @param int $amount Amount in cents
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * Sets the interface language.
     *
     * @param string $language Language code (e.g., "fr")
     * @return $this
     */
    public function setLanguage($language)
    {
        $this->language = $language;
        return $this;
    }

    /**
     * Sets the client IP address.
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
     * Sets the order identifier.
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
     * Sets the payment description.
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
     * Associates a customer object with the transaction.
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
     * Sets the recipient email address.
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
     * Sets the return method.
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
