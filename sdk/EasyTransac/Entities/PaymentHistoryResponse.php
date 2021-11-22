<?php

namespace EasyTransac\Entities;

/**
 * Represents the response of Payment history
 * @copyright EasyTransac
 */
class PaymentHistoryResponse extends Entity
{
    /** @map:OperationType **/
    protected $operationType = null;

    /** @map:PaymentMethod **/
    protected $paymentMethod = null;

    /** @map ApplicationType */
    protected $applicationType = null;

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

    /** @map:ClientIp **/
    protected $clientIp = null;

    /** @map:ClientIpCountry **/
    protected $clientIpCountry = null;

    /** @map:Currency **/
    protected $currency = null;

    /** @map:CurrencyText **/
    protected $currencyText = null;

    /** @map:FixFees **/
    protected $fixFees = null;

    /** @map:Message **/
    protected $message = null;

    /** @map:3DSecure **/
    protected $secure = null;

    /** @map:OneClick **/
    protected $oneClick = null;

    /** @object:CreditCard **/
    protected $creditCard = null;

    /** @map:Test **/
    protected $test = null;

    /** @map:Language **/
    protected $language = null;

    /** @map:Error **/
    protected $error = null;

    /** @map:AdditionalError **/
    protected $additionalError = null;

    /** @object:Client **/
    protected $client = null;

    public function getOperationType()
    {
        return $this->operationType;
    }

    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    public function getApplicationType()
    {
        return $this->applicationType;
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

    public function getDateRefund()
    {
        return $this->dateRefund;
    }

    public function getDateChargeback()
    {
        return $this->dateChargeback;
    }

    public function getDateRepresentment()
    {
        return $this->dateRepresentment;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getClientIp()
    {
        return $this->clientIp;
    }

    public function getClientIpCountry()
    {
        return $this->clientIpCountry;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function getCurrencyText()
    {
        return $this->currencyText;
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

    public function getCreditCard()
    {
        return $this->creditCard;
    }

    public function getTest()
    {
        return $this->test;
    }

    public function getLanguage()
    {
        return $this->language;
    }

    public function getError()
    {
        return $this->error;
    }

    public function getAdditionalError()
    {
        return $this->additionalError;
    }

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
