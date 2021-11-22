<?php

namespace EasyTransac\Entities;

/**
 * Represents arguments of the request "Pay by bank"
 * @copyright EasyTransac
 */
class PayByBank extends Entity
{
    /** @map:Amount **/
    protected $amount = null;

    /** @map:ClientIp **/
    protected $clientIp = null;

    /** @map:OrderId **/
    protected $orderId = null;

    /** @map:Description **/
    protected $description = null;

    /** @map:ReturnUrl **/
    protected $returnUrl = null;

    /** @object:Customer **/
    protected $customer = null;

    /** @map:PayToEmail **/
    protected $payToEmail = null;

    /** @map:PayToId **/
    protected $payToId = null;

    /** @map:UserAgent **/
    protected $userAgent = null;

    /** @map:Language **/
    protected $language = null;

    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    public function setLanguage($language)
    {
        $this->language = $language;
        return $this;
    }

    public function setClientIp($clientIp)
    {
        $this->clientIp = $clientIp;
        return $this;
    }

    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
        return $this;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function setReturnUrl($returnUrl)
    {
        $this->returnUrl = $returnUrl;
        return $this;
    }

    public function setCustomer($customer)
    {
        $this->customer = $customer;
        return $this;
    }

    public function setPayToEmail($payToEmail)
    {
        $this->payToEmail = $payToEmail;
        return $this;
    }

    public function setPayToId($payToId)
    {
        $this->payToId = $payToId;
        return $this;
    }

    public function setUserAgent($userAgent)
    {
        $this->userAgent = $userAgent;
        return $this;
    }
}
