<?php

namespace EasyTransac\Entities;

/**
 * Represents arguments of the request "OneClickPayment"
 * @author klyde
 * @copyright EasyTransac
 */
class OneClickTransaction extends Entity
{
    /** @map:Amount **/
    protected $amount = null;
    /** @map:Uid **/
    protected $uid = null;
    /** @map:OrderId **/
    protected $orderId = null;
    /** @map:Description **/
    protected $description = null;
    /** @map:ClientIp **/
    protected $clientIp = null;
    /** @map:Alias **/
    protected $alias = null;
    /** @map:PayToEmail **/
    protected $payToEmail = null;
    /** @map:UserAgent **/
    protected $userAgent = null;
    /** @map:Language **/
    protected $language = null;
    /** @map:ClientId **/
    protected $clientId = null;
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
    
    public function setAlias($value)
    {
        $this->alias = $value;
        return $this;
    }

    public function getAlias()
    {
        return $this->alias;
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

    public function setUid($value)
    {
        $this->uid = $value;
        return $this;
    }

    public function getUid()
    {
        return $this->uid;
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
	
	public function getClientId() 
	{
		return $this->clientId;
	}
	
	public function setClientId($clientId) 
	{
		$this->clientId = $clientId;
		return $this;
	}
	
	function getVersion()
	{
		return $this->version;
	}

	function setVersion($version)
	{
        $this->version = $version;
        return $this;
	}
}

?>
