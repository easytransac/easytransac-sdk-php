<?php

namespace EasyTransac\Entities;

/**
 * Represents arguments for the request "PaymentPage"
 * @author klyde
 * @copyright EasyTransac
 */
class PaymentPageTransaction extends Entity
{
    /** @map:SendEmail **/
    protected $sendEmail = null;
    /** @map:OrderId **/
    protected $orderId = null;
    /** @map:Description **/
    protected $description = null;
    /** @map:Amount **/
    protected $amount = null;
    /** @map:ClientIP **/
    protected $clientIP = null;
    /** @map:3DS **/
    protected $secure = null;
    /** @map:ReturnUrl **/
    protected $returnUrl = null;
    /** @map:CancelUrl **/
    protected $cancelUrl = null;
    /** @object:Customer **/
    protected $customer = null;
    /** @map:MultiplePayments **/
    protected $multiplePayments = null;
    /** @map:MultiplePaymentsRepeat **/
    protected $multiplePaymentsRepeat = null;
    /** @map:DownPayment **/
    protected $downPayment = null;
    /** @map:Rebill **/
    protected $Rebill = null;
    /** @map:Recurrence **/
    protected $recurrence = null;
    /** @map:PayToEmail **/
    protected $payToEmail = null;
    /** @map:UserAgent **/
    protected $userAgent = null;
    /** @map:Language **/
    protected $language = null;
    /** @map:Version **/
    protected $version = null;

    public function __construct()
    {
    	parent::__construct();
    	 
    	if (isset($_SERVER['REMOTE_ADDR']) && !empty($_SERVER['REMOTE_ADDR']))
    		$this->setClientIp($_SERVER['REMOTE_ADDR']);
    	
    	if (isset($_SERVER['HTTP_USER_AGENT']) && !empty($_SERVER['HTTP_USER_AGENT']))
    		$this->setUserAgent($_SERVER['HTTP_USER_AGENT']);
    }
    
    public function getSendEmail()
    {
        return $this->sendEmail;
    }

    public function setSendEmail($sendEmail)
    {
        $this->sendEmail = $sendEmail;

        return $this;
    }

    public function getVersion()
    {
        return $this->version;
    }

    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    public function getOrderId()
    {
        return $this->orderId;
    }

    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;

        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    public function getClientIP()
    {
        return $this->clientIP;
    }

    public function setClientIP($clientIP)
    {
        $this->clientIP = $clientIP;
        return $this;
    }

    public function getSecure()
    {
        return $this->secure;
    }

    public function setSecure($secure)
    {
        $this->secure = $secure;
        return $this;
    }

    public function getReturnUrl()
    {
        return $this->returnUrl;
    }

    public function setReturnUrl($returnUrl)
    {
        $this->returnUrl = $returnUrl;
        return $this;
    }

    public function getCancelUrl()
    {
        return $this->cancelUrl;
    }

    public function setCancelUrl($cancelUrl)
    {
        $this->cancelUrl = $cancelUrl;
        return $this;
    }

    public function getCustomer()
    {
        return $this->customer;
    }

    public function setCustomer(Entity $customer)
    {
        $this->customer = $customer;
        return $this;
    }

    public function getMultiplePayments()
    {
        return $this->multiplePayments;
    }

    public function setMultiplePayments($multiplePayments)
    {
        $this->multiplePayments = $multiplePayments;
        return $this;
    }

    public function getMultiplePaymentsRepeat()
    {
        return $this->multiplePaymentsRepeat;
    }

    public function setMultiplePaymentsRepeat($multiplePaymentsRepeat)
    {
        $this->multiplePaymentsRepeat = $multiplePaymentsRepeat;
        return $this;
    }

    public function getDownPayment()
    {
        return $this->downPayment;
    }

    public function setDownPayment($downPayment)
    {
        $this->downPayment = $downPayment;
        return $this;
    }

    public function getRebill()
    {
        return $this->Rebill;
    }

    public function setRebill($Rebill)
    {
        $this->Rebill = $Rebill;
        return $this;
    }

    public function getRecurrence()
    {
        return $this->recurrence;
    }

    public function setRecurrence($recurrence)
    {
        $this->recurrence = $recurrence;
        return $this;
    }

    public function getPayToEmail()
    {
        return $this->payToEmail;
    }

    public function setPayToEmail($payToEmail)
    {
        $this->payToEmail = $payToEmail;
        return $this;
    }

    public function getUserAgent()
    {
        return $this->userAgent;
    }

    public function setUserAgent($userAgent)
    {
        $this->userAgent = $userAgent;
        return $this;
    }

    public function getLanguage()
    {
        return $this->language;
    }

    public function setLanguage($language)
    {
        $this->language = $language;
        return $this;
    }
}

?>