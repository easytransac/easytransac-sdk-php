<?php

namespace EasyTransac\Entities;

/**
 * Represents the response of the request "PaymentPage"
 * @copyright EasyTransac
 */
class PaymentPageInfos extends Entity
{
    /** @map:RequestId **/
    protected $requestId = null;

    /** @map:OperationType **/
    protected $operationType = null;

    /** @map ApplicationType */
    protected $applicationType = null;

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

    /** @map:Language **/
    protected $language = null;

    /** @map:Live **/
    protected $live = null;

    /** @map:PaymentMethod **/
    protected $paymentMethod = null;

    public function getRequestId()
    {
        return $this->requestId;
    }

    public function getOperationType()
    {
        return $this->operationType;
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

    public function getLanguage()
    {
        return $this->language;
    }

    public function getLive()
    {
        return $this->live;
    }

    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    public function getApplicationType()
    {
        return $this->applicationType;
    }
}
