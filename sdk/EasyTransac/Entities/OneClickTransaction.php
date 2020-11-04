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
	/** @map:3DS **/
	protected $secure = null;
	/** @map:ReturnUrl **/
	protected $returnUrl = null;
	/** @map:CardCVV **/
	protected $CVV = null;
	/** @map:PreAuth **/
	protected $preAuth = null;
	/** @map:PreAuthDuration **/
	protected $preAuthDuration = null;

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

    public function setUid($value)
    {
        $this->uid = $value;
        return $this;
    }

    public function setAmount($value)
    {
        $this->amount = $value;
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

	public function setClientId($clientId) 
	{
		$this->clientId = $clientId;
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

	public function setCVV($cvv)
	{
		$this->CVV = $cvv;
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
}

?>
