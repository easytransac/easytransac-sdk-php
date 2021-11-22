<?php

namespace EasyTransac\Entities;

/**
 * Represents the response of Payment history
 * URL: https://www.easytransac.com/fr/documentation#tag/API-Payment/paths/~1api~1payment~1requests/post
 * @copyright EasyTransac
 */
class PaymentRequestsHistoryResponse extends Entity
{
    /** @map:RequestId **/
    protected $requestId = null;

    /** @map:OperationType **/
    protected $operationType = null;

    /** @map:PaymentMethod **/
    protected $paymentMethod = null;

    /** @map:Status **/
    protected $status = null;

    /** @map:Date **/
    protected $date = null;

    /** @map:DateSent **/
    protected $dateSent = null;

    /** @map:Amount **/
    protected $amount = null;

    /** @map:3DSecure **/
    protected $secure = null;

    /** @map:PageUrl **/
    protected $pageUrl = null;

    /** @map:Email **/
    protected $email = null;

    /** @map:Phone **/
    protected $phone = null;

    /** @map:Live **/
    protected $live = null;

    /** @map:Language **/
    protected $language = null;

    public function getRequestId()
    {
        return $this->requestId;
    }

    public function getOperationType()
    {
        return $this->operationType;
    }

    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getDateSent()
    {
        return $this->dateSent;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getSecure()
    {
        return $this->secure;
    }

    public function getPageUrl()
    {
        return $this->pageUrl;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getLive()
    {
        return $this->live;
    }

    public function getLanguage()
    {
        return $this->language;
    }

    public function isCaptured()
    {
        return $this->status === 'captured';
    }

    public function isPending()
    {
        return $this->status === 'pending';
    }

    public function isExpired()
    {
        return $this->status === 'expired';
    }

    public function isCancelled()
    {
        return $this->status === 'cancelled';
    }

    public function isToSend()
    {
        return $this->status === 'tosend';
    }

    public function isLocked()
    {
        return $this->status === 'locked';
    }

    public function isDone()
    {
        return $this->status === 'done';
    }
}
