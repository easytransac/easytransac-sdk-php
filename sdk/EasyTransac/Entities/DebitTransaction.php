<?php

namespace EasyTransac\Entities;

/**
 * Represents arguments of the request "DebitPayment"
 * @author klyde
 * @copyright EasyTransac
 */
class DebitTransaction extends Entity
{
    /** @map:Amount **/
    protected $amount = null;
    /** @map:OrderId **/
    protected $orderId = null;
    /** @map:Description **/
    protected $description = null;
    /** @map:ClientIp **/
    protected $clientIp = null;
    /** @map:3DS **/
    protected $secure = null;
    /** @map:DownPayment **/
    protected $downPayment = null;
    /** @map:MultiplePayments **/
    protected $multiplePayments = null;
    /** @map:MultiplePaymentsRepeat **/
    protected $multiplePaymentsRepeat = null;
    /** @map:Rebill **/
    protected $rebill = null;
    /** @map:Recurrence **/
    protected $recurrence = null;
    /** @map:PayToEmail **/
    protected $payToEmail = null;
    /** @map:UserAgent **/
    protected $userAgent = null;
    /** @map:Language **/
    protected $language = null;
    /** @map:Bic **/
    protected $bic = null;
    /** @map:Iban **/
    protected $iban = null;
    /** @object:Customer **/
    protected $customer = null;
    /** @map:AccountOwner **/
    protected $accountOwner = null;
    /** @map:ReturnUrl **/
    protected $returnUrl = null;
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

    public function setReturnUrl($returnUrl)
    {
    	$this->returnUrl = $returnUrl;
    	return $this;
    }
    
    public function setCustomer(Customer $value)
    {
        $this->customer = $value;
        return $this;
    }

	public function setAccountOwner($value)
	{
		$this->accountOwner = $value;
		return $this;
	}

    public function setMultiplePayments($value)
    {
        $this->multiplePayments = $value;
        return $this;
    }

    public function setDownPayment($value)
    {
        $this->downPayment = $value;
        return $this;
    }

    public function setClientIp($value)
    {
        $this->clientIp = $value;
        return $this;
    }

    public function setDescription($value)
    {
        $this->description = $value;
        return $this;
    }

    public function setOrderId($value)
    {
        $this->orderId = $value;
        return $this;
    }

    public function setAmount($value)
    {
        $this->amount = $value;
        return $this;
    }

	public function setBic($bic) 
	{
		$this->bic = $bic;
		return $this;
	}

	public function setIban($iban) 
	{
		$this->iban = $iban;
		return $this;
	}

	public function setSecure($secure) 
	{
		$this->secure = $secure;
		return $this;
	}

	public function setMultiplePaymentsRepeat($multiplePaymentsRepeat) 
	{
		$this->multiplePaymentsRepeat = $multiplePaymentsRepeat;
		return $this;
	}

	public function setRebill($rebill) 
	{
		$this->rebill = $rebill;
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