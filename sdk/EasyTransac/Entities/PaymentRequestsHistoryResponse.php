<?php

namespace EasyTransac\Entities;

/**
 * Represents the response for the payment requests history.
 * This entity contains the information returned by the EasyTransac API
 * regarding performed payment requests.
 *
 * Documentation URL:
 * https://www.easytransac.com/fr/documentation#tag/API-Payment/paths/~1api~1payment~1requests/post
 *
 */
class PaymentRequestsHistoryResponse extends Entity
{
    /**
     * Unique identifier of the payment request.
     *
     * @var string|null
     * @map:RequestId
     */
    protected $requestId = null;

    /**
     * Operation type (e.g., debit, refund).
     *
     * @var string|null
     * @map:OperationType
     */
    protected $operationType = null;

    /**
     * Payment method used (e.g., CB, SEPA).
     *
     * @var string|null
     * @map:PaymentMethod
     */
    protected $paymentMethod = null;

    /**
     * Current request status (e.g., captured, pending, done).
     *
     * @var string|null
     * @map:Status
     */
    protected $status = null;

    /**
     * Request creation date.
     *
     * @var string|null
     * @map:Date
     */
    protected $date = null;

    /**
     * Date when the request was sent.
     *
     * @var string|null
     * @map:DateSent
     */
    protected $dateSent = null;

    /**
     * Requested amount (in cents).
     *
     * @var int|null
     * @map:Amount
     */
    protected $amount = null;

    /**
     * Whether the request is protected by 3D Secure.
     *
     * @var bool|null
     * @map:3DSecure
     */
    protected $secure = null;

    /**
     * URL of the generated payment page.
     *
     * @var string|null
     * @map:PageUrl
     */
    protected $pageUrl = null;

    /**
     * Email address associated with the request.
     *
     * @var string|null
     * @map:Email
     */
    protected $email = null;

    /**
     * Recipient phone number.
     *
     * @var string|null
     * @map:Phone
     */
    protected $phone = null;

    /**
     * Indicates whether the request is in production (live) environment.
     *
     * @var bool|null
     * @map:Live
     */
    protected $live = null;

    /**
     * Language used for the request.
     *
     * @var string|null
     * @map:Language
     */
    protected $language = null;

    /**
     * Returns the request identifier.
     *
     * @return string|null
     */
    public function getRequestId()
    {
        return $this->requestId;
    }

    /**
     * Returns the operation type.
     *
     * @return string|null
     */
    public function getOperationType()
    {
        return $this->operationType;
    }

    /**
     * Returns the payment method.
     *
     * @return string|null
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * Returns the current request status.
     *
     * @return string|null
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Returns the creation date.
     *
     * @return string|null
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Returns the date the request was sent.
     *
     * @return string|null
     */
    public function getDateSent()
    {
        return $this->dateSent;
    }

    /**
     * Returns the requested amount.
     *
     * @return int|null
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Indicates whether 3D Secure is enabled.
     *
     * @return bool|null
     */
    public function getSecure()
    {
        return $this->secure;
    }

    /**
     * Returns the payment page URL.
     *
     * @return string|null
     */
    public function getPageUrl()
    {
        return $this->pageUrl;
    }

    /**
     * Returns the recipient email address.
     *
     * @return string|null
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Returns the recipient phone number.
     *
     * @return string|null
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Indicates whether the request was made in a live environment.
     *
     * @return bool|null
     */
    public function getLive()
    {
        return $this->live;
    }

    /**
     * Returns the request language.
     *
     * @return string|null
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Checks whether the request has been captured.
     *
     * @return bool
     */
    public function isCaptured()
    {
        return $this->status === 'captured';
    }

    /**
     * Checks whether the request is pending.
     *
     * @return bool
     */
    public function isPending()
    {
        return $this->status === 'pending';
    }

    /**
     * Checks whether the request is expired.
     *
     * @return bool
     */
    public function isExpired()
    {
        return $this->status === 'expired';
    }

    /**
     * Checks whether the request has been cancelled.
     *
     * @return bool
     */
    public function isCancelled()
    {
        return $this->status === 'cancelled';
    }

    /**
     * Checks whether the request is still to be sent.
     *
     * @return bool
     */
    public function isToSend()
    {
        return $this->status === 'tosend';
    }

    /**
     * Checks whether the request is locked.
     *
     * @return bool
     */
    public function isLocked()
    {
        return $this->status === 'locked';
    }

    /**
     * Checks whether the request is done/finalized.
     *
     * @return bool
     */
    public function isDone()
    {
        return $this->status === 'done';
    }
}
