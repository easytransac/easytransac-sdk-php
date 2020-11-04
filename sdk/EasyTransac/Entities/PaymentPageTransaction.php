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
    /** @map:SendSMS **/
    protected $sendSMS = null;
    /** @map:SendLater **/
    protected $sendLater = null;
    /** @map:OrderId **/
    protected $orderId = null;
    /** @map:OperationType **/
    protected $operationType = null;
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
    /** @map:AskAmount **/
    protected $askAmount = null;
    /** @map:AskInvoiceNumber **/
    protected $askInvoiceNumber = null;
    /** @map:PreAuth **/
    protected $preAuth = null;
    /** @map:PreAuthDuration **/
    protected $preAuthDuration = null;
    /** @map:SddCallingCode **/
    protected $sddCallingCode = null;
    /** @map:SddPhone **/
    protected $sddPhone = null;

    public function __construct()
    {
    	parent::__construct();
    	 
    	if (isset($_SERVER['REMOTE_ADDR']) && !empty($_SERVER['REMOTE_ADDR']))
    		$this->setClientIp($_SERVER['REMOTE_ADDR']);
    	
    	if (isset($_SERVER['HTTP_USER_AGENT']) && !empty($_SERVER['HTTP_USER_AGENT']))
    		$this->setUserAgent($_SERVER['HTTP_USER_AGENT']);
    }

    public function setSendEmail($sendEmail)
    {
        $this->sendEmail = $sendEmail;
        return $this;
    }

	public function setSendSMS($sendSMS)
	{
		$this->sendSMS = $sendSMS;
		return $this;
	}

	public function setSendLater($date)
	{
		$this->sendLater = $date;
		return $this;
	}

    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
        return $this;
    }

	public function setOperationType($operationType)
	{
		$this->operationType = $operationType;
		return $this;
	}

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    public function setClientIP($clientIP)
    {
        $this->clientIP = $clientIP;
        return $this;
    }

    public function setSecure($secure)
    {
        $this->secure = $secure;
        return $this;
    }

    public function setReturnUrl($returnUrl)
    {
        $this->returnUrl = $returnUrl;
        return $this;
    }

    public function setCancelUrl($cancelUrl)
    {
        $this->cancelUrl = $cancelUrl;
        return $this;
    }

    public function setCustomer(Entity $customer)
    {
        $this->customer = $customer;
        return $this;
    }

    public function setMultiplePayments($multiplePayments)
    {
        $this->multiplePayments = $multiplePayments;
        return $this;
    }

    public function setMultiplePaymentsRepeat($multiplePaymentsRepeat)
    {
        $this->multiplePaymentsRepeat = $multiplePaymentsRepeat;
        return $this;
    }

    public function setDownPayment($downPayment)
    {
        $this->downPayment = $downPayment;
        return $this;
    }

    public function setRebill($Rebill)
    {
        $this->Rebill = $Rebill;
        return $this;
    }

    public function setRecurrence($recurrence)
    {
        $this->recurrence = $recurrence;
        return $this;
    }

    public function setPayToEmail($payToEmail)
    {
        $this->payToEmail = $payToEmail;
        return $this;
    }

    public function setUserAgent($userAgent)
    {
        $this->userAgent = $userAgent;
        return $this;
    }

    public function setLanguage($language)
    {
        $this->language = $language;
        return $this;
    }

    public function setAskAmount($askAmount)
    {
    	$this->askAmount = $askAmount;
        return $this;
    }

    public function setAskInvoiceNumber($askInvoiceNumber)
    {
    	$this->askInvoiceNumber = $askInvoiceNumber;
        return $this;
    }

    public function setPreAuth($preAuth)
    {
    	$this->preAuth = $preAuth;
        return $this;
    }

    public function setPreAuthDuration($preAuthDuration)
    {
        $this->preAuthDuration = $preAuthDuration;
        return $this;
    }

    public function setSddCallingCode($sddCallingCode)
    {
        $this->sddCallingCode = $sddCallingCode;
        return $this;
    }

    public function setSddPhone($sddPhone)
    {
        $this->sddPhone = $sddPhone;
        return $this;
    }
}

?>
