<?php

namespace EasyTransac\Entities;

/**
 * Represents the response of a "Drop-in session" request.
 *
 * The API documentation refers to a SESSION_TOKEN. Depending on the exact
 * payload naming, the SDK accepts SESSION_TOKEN, SessionToken and Token.
 *
 * @copyright EasyTransac
 */
class DropinSession extends Entity
{
    /** @map:SESSION_TOKEN **/
    protected $uppercaseSessionToken = null;

    /** @map:SessionToken **/
    protected $sessionToken = null;

    /** @map:Token **/
    protected $token = null;

    /** @map:RequestId **/
    protected $requestId = null;

    /** @map:Status **/
    protected $status = null;

    /** @map:Date **/
    protected $date = null;

    /** @map:Amount **/
    protected $amount = null;

    /** @map:Currency **/
    protected $currency = null;

    /** @map:Live **/
    protected $live = null;

    /** @map:ReturnUrl **/
    protected $returnUrl = null;

    /** @map:CancelUrl **/
    protected $cancelUrl = null;

    /** @map:NotificationUrl **/
    protected $notificationUrl = null;

    public function getToken()
    {
        return $this->uppercaseSessionToken ?: $this->sessionToken ?: $this->token;
    }

    public function getSessionToken()
    {
        return $this->getToken();
    }

    public function getUppercaseSessionToken()
    {
        return $this->uppercaseSessionToken;
    }

    public function getRawToken()
    {
        return $this->token;
    }

    public function hasToken()
    {
        return $this->getToken() !== null && $this->getToken() !== '';
    }

    public function getRequestId()
    {
        return $this->requestId;
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

    public function getLive()
    {
        return $this->live;
    }

    public function getReturnUrl()
    {
        return $this->returnUrl;
    }

    public function getCancelUrl()
    {
        return $this->cancelUrl;
    }

    public function getNotificationUrl()
    {
        return $this->notificationUrl;
    }
}
