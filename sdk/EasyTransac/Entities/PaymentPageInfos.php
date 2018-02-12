<?php

namespace EasyTransac\Entities;

/**
 * Represents the response of the request "PaymentPage"
 * @author klyde
 * @copyright EasyTransac
 */
class PaymentPageInfos extends Entity
{
    /** @map:RequestId **/
    protected $requestId = null;
    /** @map:Status **/
    protected $status = null;
    /** @map:Date **/
    protected $date = null;
    /** @map:Amount **/
    protected $amount = null;
    /** @map:FixFees **/
    protected $fixFees = null;
    /** @map:3DSecure **/
    protected $secure = null;
    /** @map:PageUrl **/
    protected $pageUrl = null;
    /** @map:Email **/
    protected $email = null;
    /** @map:Language **/
    protected $language = null;

    public function setRequestId($value)
    {
        $this->requestId = $value;
        return $this;
    }

    public function getRequestId()
    {
        return $this->requestId;
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

    public function getFixFees()
    {
        return $this->fixFees;
    }

    public function setFixFees($fixFees)
    {
        $this->fixFees = $fixFees;
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

    public function getPageUrl()
    {
        return $this->pageUrl;
    }

    public function setPageUrl($pageUrl)
    {
        $this->pageUrl = $pageUrl;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
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