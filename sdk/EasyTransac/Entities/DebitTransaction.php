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

    public function __construct()
    {
    	parent::__construct();
    	 
    	if (isset($_SERVER['REMOTE_ADDR']) && !empty($_SERVER['REMOTE_ADDR']))
    		$this->setClientIp($_SERVER['REMOTE_ADDR']);
    	
    	if (isset($_SERVER['HTTP_USER_AGENT']) && !empty($_SERVER['HTTP_USER_AGENT']))
    		$this->setUserAgent($_SERVER['HTTP_USER_AGENT']);
    }
    
    public function setCustomer(Customer $value)
    {
        $this->customer = $value;
        return $this;
    }

    public function getCustomer()
    {
        return $this->customer;
    }

    public function setMultiplePayments($value)
    {
        $this->multiplePayments = $value;
        return $this;
    }

    public function getMultiplePayments()
    {
        return $this->multiplePayments;
    }

    public function setDownPayment($value)
    {
        $this->downPayment = $value;
        return $this;
    }

    public function getDownPayment()
    {
        return $this->downPayment;
    }

    public function setClientIp($value)
    {
        $this->clientIp = $value;
        return $this;
    }

    public function getClientIp()
    {
        return $this->clientIp;
    }

    public function setDescription($value)
    {
        $this->description = $value;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setOrderId($value)
    {
        $this->orderId = $value;
        return $this;
    }

    public function getOrderId()
    {
        return $this->orderId;
    }

    public function setAmount($value)
    {
        $this->amount = $value;
        return $this;
    }

    public function getAmount()
    {
        return $this->amount;
    }
    
	public function getBic() 
	{
		return $this->bic;
	}
	
	public function setBic($bic) 
	{
		$this->bic = $bic;
		return $this;
	}
	
	public function getIban() 
	{
		return $this->iban;
	}
	
	public function setIban($iban) 
	{
		$this->iban = $iban;
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
	
	public function getMultiplePaymentsRepeat() 
	{
		return $this->multiplePaymentsRepeat;
	}
	
	public function setMultiplePaymentsRepeat($multiplePaymentsRepeat) 
	{
		$this->multiplePaymentsRepeat = $multiplePaymentsRepeat;
		return $this;
	}
	
	public function getRebill() 
	{
		return $this->rebill;
	}
	
	public function setRebill($rebill) 
	{
		$this->rebill = $rebill;
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