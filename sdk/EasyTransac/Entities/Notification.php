<?php

namespace EasyTransac\Entities;

/**
 * Represents a payment notification
 * @author klyde
 * @copyright EasyTransac
 */
class Notification extends Entity
{
	/** @map:NotificationType **/
	protected $notificationType = null;
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
	/** @map:Error **/
	protected $error = null;

	public function getNotificationType()
	{
		return $this->notificationType;
	}

	public function getOperationType() 
	{
		return $this->operationType;
	}

	public function getRequestId() 
	{
		return $this->requestId;
	}

	public function getTid() 
	{
		return $this->tid;
	}

	public function getUid() 
	{
		return $this->uid;
	}

	public function getOrderId() 
	{
		return $this->orderId;
	}

	public function getStatus() 
	{
		return $this->status;
	}

	public function getDate() 
	{
		return $this->date;
	}

	public function getAmount() 
	{
		return $this->amount;
	}

	public function getCurrency() 
	{
		return $this->currency;
	}

	public function getFixFees() 
	{
		return $this->fixFees;
	}

	public function getMessage() 
	{
		return $this->message;
	}

	public function getSecure()
	{
		return $this->secure;
	}

	public function getOneClick() 
	{
		return $this->oneClick;
	}

	public function getAlias() 
	{
		return $this->alias;
	}

	public function getCardNumber() 
	{
		return $this->cardNumber;
	}

	public function getTest() 
	{
		return $this->test;
	}

	public function getSignature() 
	{
		return $this->signature;
	}

	public function getClient() 
	{
		return $this->client;
	}

	public function getError() 
	{
		return $this->error;
	}
}

?>