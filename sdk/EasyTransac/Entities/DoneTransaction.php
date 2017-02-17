<?php

namespace EasyTransac\Entities;

/**
 * Represents the response of requests "DirectPayment", "OneClickPayment", "PaymentStatus" and "PaymentRefund"
 * @author klyde
 * @copyright EasyTransac
 */
class DoneTransaction extends Entity
{
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
    /** @map:DateRefund **/
    protected $dateRefund = null;
    /** @map:DateChargeback **/
    protected $dateChargeback = null;
    /** @map:DateRepresentment **/
    protected $dateRepresentment = null;
    /** @map:Amount **/
    protected $amount = null;
    /** @map:FixFees **/
    protected $fixFees = null;
    /** @map:Message **/
    protected $message = null;
    /** @map:3DSecure **/
    protected $secure = null;
    /** @map:OneClick **/
    protected $oneClick = null;
    /** @map:MultiplePayments **/
    protected $multiplePayments = null;
    /** @map:Rebill **/
    protected $rebill = null;
    /** @map:OriginalPaymentTid **/
    protected $originalPaymentTid = null;
    /** @map:Alias **/
    protected $alias = null;
    /** @map:Error **/
    protected $error = null;
    /** @map:AdditionalError **/
    protected $additionalError = null;
    /** @map:3DSecureUrl **/
    protected $secureUrl = null;
    /** @object:Client **/
    protected $client = null;
    /** @map:MandateUrl **/
    protected $mandateUrl = null;

    public function setSecureUrl($value)
    {
        $this->secureUrl = $value;
        return $this;
    }

    public function getSecureUrl()
    {
        return $this->secureUrl;
    }

    public function setAdditionalError($value)
    {
        $this->additionalError = $value;
        return $this;
    }

    public function getAdditionalError()
    {
        return $this->additionalError;
    }

    public function setError($value)
    {
        $this->error = $value;
        return $this;
    }

    public function getError()
    {
        return $this->error;
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

    public function setOriginalPaymentTid($value)
    {
        $this->originalPaymentTid = $value;
        return $this;
    }

    public function getOriginalPaymentTid()
    {
        return $this->originalPaymentTid;
    }

    public function setRebill($value)
    {
        $this->rebill = $value;
        return $this;
    }

    public function getRebill()
    {
        return $this->rebill;
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

    public function setOneClick($value)
    {
        $this->oneClick = $value;
        return $this;
    }

    public function getOneClick()
    {
        return $this->oneClick;
    }

    public function setSecure($value)
    {
        $this->secure = $value;
        return $this;
    }

    public function getSecure()
    {
        return $this->secure;
    }

    public function setMessage($value)
    {
        $this->message = $value;
        return $this;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setFixFees($value)
    {
        $this->fixFees = $value;
        return $this;
    }

    public function getFixFees()
    {
        return $this->fixFees;
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

    public function setDateRepresentment($value)
    {
        $this->dateRepresentment = $value;
        return $this;
    }

    public function getDateRepresentment()
    {
        return $this->dateRepresentment;
    }

    public function setDateChargeback($value)
    {
        $this->dateChargeback = $value;
        return $this;
    }

    public function getDateChargeback()
    {
        return $this->dateChargeback;
    }

    public function setDateRefund($value)
    {
        $this->dateRefund = $value;
        return $this;
    }

    public function getDateRefund()
    {
        return $this->dateRefund;
    }

    public function setDate($value)
    {
        $this->date = $value;
        return $this;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setStatus($value)
    {
        $this->status = $value;
        return $this;
    }

    public function getStatus()
    {
        return $this->status;
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

    public function setTid($value)
    {
        $this->tid = $value;
        return $this;
    }

    public function getTid()
    {
        return $this->tid;
    }

    public function setRequestId($value)
    {
        $this->requestId = $value;
        return $this;
    }

    public function getRequestId()
    {
        return $this->requestId;
    }

    public function setMandateUrl($value)
    {
        $this->mandateUrl = $value;
        return $this;
    }

    public function getMandateUrl()
    {
        return $this->mandateUrl;
    }
    
	/**
	 * Returns the transaction client.
	 * @return Client
	 */
    public function getClient()
    {
    	return $this->client;
    }
    
    public function setClient(Client $client)
    {
    	$this->client = $client;
    	return $this;
    }
	
	public function isCaptured()
	{
		return $this->status === 'captured';
	}
	
	public function isPending()
	{
		return $this->status === 'pending';
	}
}

?>