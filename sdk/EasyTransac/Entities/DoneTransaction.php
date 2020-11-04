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
	/** @map:OriginalRequestId **/
	protected $originalRequestId = null;
	/** @map:RequestAttempt **/
	protected $requestAttempt = null;
	/** @map:OperationType **/
	protected $operationType = null;
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
	/** @map:AmountRefund **/
	protected $amountRefund = null;
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
	/** @map:RedirectUrl **/
	protected $redirectUrl = null;
	/** @map:Test **/
	protected $test = null;

    public function getSecureUrl()
    {
        return $this->secureUrl;
    }

	public function getRequestAttempt()
	{
		return $this->requestAttempt;
	}

	public function getOriginalRequestId()
	{
		return $this->originalRequestId;
	}

	public function getOperationType()
	{
		return $this->operationType;
	}

    public function getAdditionalError()
    {
        return $this->additionalError;
    }

    public function getError()
    {
        return $this->error;
    }

    public function getAlias()
    {
        return $this->alias;
    }

    public function getOriginalPaymentTid()
    {
        return $this->originalPaymentTid;
    }

    public function getRebill()
    {
        return $this->rebill;
    }

    public function getMultiplePayments()
    {
        return $this->multiplePayments;
    }

    public function getOneClick()
    {
        return $this->oneClick;
    }

    public function getSecure()
    {
        return $this->secure;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getFixFees()
    {
        return $this->fixFees;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getDateRepresentment()
    {
        return $this->dateRepresentment;
    }

    public function getDateChargeback()
    {
        return $this->dateChargeback;
    }

    public function getDateRefund()
    {
        return $this->dateRefund;
    }

	public function getAMountRefund()
	{
		return $this->amountRefund;
	}

    public function getDate()
    {
        return $this->date;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getOrderId()
    {
        return $this->orderId;
    }

    public function getUid()
    {
        return $this->uid;
    }

    public function getTid()
    {
        return $this->tid;
    }

    public function getRequestId()
    {
        return $this->requestId;
    }

    public function getMandateUrl()
    {
        return $this->mandateUrl;
    }

	public function getRedirectUrl()
	{
		return $this->redirectUrl;
	}

	public function getTest()
	{
		return $this->test;
	}
    
	/**
	 * Returns the transaction client.
	 * @return Client
	 */
    public function getClient()
    {
    	return $this->client;
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