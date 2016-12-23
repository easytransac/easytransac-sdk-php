<?php

namespace EasyTransac\Entities;

/**
 * Represents a payment notification
 * @author klyde
 * @copyright EasyTransac
 */
class Notification extends Entity
{
	/** @map:OperationType **/
	protected $operationType = null;
	/** @map:RequestId **/
	protected $requestId = null;
	/** @map:Tid **/
	protected $tid = null;
	/** @map:Uid **/
	protected $uid = null;
	/** @map:OrderId **/
	protected $orderId = null;
	/** @map:Status **/
	protected $status = null;
	/** @map:Date **/
	protected $date = null;
	/** @map:Amount **/
	protected $amount = null;
	/** @map:Currency **/
	protected $currency = null;
	/** @map:FixFees **/
	protected $fixFees = null;
	/** @map:Message **/
	protected $message = null;
	/** @map:3DSecure **/
	protected $secure = null;
	/** @map:OneClick **/
	protected $oneClick = null;
	/** @map:Alias **/
	protected $alias = null;
	/** @map:CardNumber **/
	protected $cardNumber = null;
	/** @map:Test **/
	protected $test = null;
	/** @map:Signature **/
	protected $signature = null;
	/** @object:Client **/
	protected $client = null;
	
	public function getOperationType() 
	{
		return $this->operationType;
	}
	
	public function setOperationType($operationType) 
	{
		$this->operationType = $operationType;
		return $this;
	}
	
	public function getRequestId() 
	{
		return $this->requestId;
	}
	
	public function setRequestId($requestId) 
	{
		$this->requestId = $requestId;
		return $this;
	}
	
	public function getTid() 
	{
		return $this->tid;
	}
	
	public function setTid($tid) 
	{
		$this->tid = $tid;
		return $this;
	}
	
	public function getUid() 
	{
		return $this->uid;
	}
	
	public function setUid($uid) 
	{
		$this->uid = $uid;
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
	
	public function getStatus() 
	{
		return $this->status;
	}
	
	public function setStatus($status) 
	{
		$this->status = $status;
		return $this;
	}
	
	public function getDate() 
	{
		return $this->date;
	}
	
	public function setDate($date) 
	{
		$this->date = $date;
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
	
	public function getCurrency() 
	{
		return $this->currency;
	}
	
	public function setCurrency($currency) 
	{
		$this->currency = $currency;
		return $this;
	}
	
	public function getFixFees() 
	{
		return $this->fixFees;
	}
	
	public function setFixFees($fixFees) 
	{
		$this->fixFees = $fixFees;
		return $this;
	}
	
	public function getMessage() 
	{
		return $this->message;
	}
	
	public function setMessage($message) 
	{
		$this->message = $message;
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
	
	public function getOneClick() 
	{
		return $this->oneClick;
	}
	
	public function setOneClick($oneClick) 
	{
		$this->oneClick = $oneClick;
		return $this;
	}
	
	public function getAlias() 
	{
		return $this->alias;
	}
	
	public function setAlias($alias) 
	{
		$this->alias = $alias;
		return $this;
	}
	
	public function getCardNumber() 
	{
		return $this->cardNumber;
	}
	
	public function setCardNumber($cardNumber) 
	{
		$this->cardNumber = $cardNumber;
		return $this;
	}
	
	public function getTest() 
	{
		return $this->test;
	}
	
	public function setTest($test) 
	{
		$this->test = $test;
		return $this;
	}
	
	public function getSignature() 
	{
		return $this->signature;
	}
	
	public function setSignature($signature) 
	{
		$this->signature = $signature;
		return $this;
	}
	
	public function getClient() 
	{
		return $this->client;
	}
	
	public function setClient(Client $client) 
	{
		$this->client = $client;
		return $this;
	}
}

?>