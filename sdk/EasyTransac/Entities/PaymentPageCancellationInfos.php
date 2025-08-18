<?php

namespace EasyTransac\Entities;

/**
 * Represents the response for the "cancelpage" request.
 * This entity contains the information returned after attempting
 * to cancel a payment page via the EasyTransac API.
 */
class PaymentPageCancellationInfos extends Entity
{
    /**
     * Unique identifier of the cancellation request.
     *
     * @var string|null
     * @map:RequestId
     */
    protected $requestId = null;

    /**
     * Type of operation concerned (e.g., debit, refund).
     *
     * @var string|null
     * @map:OperationType
     */
    protected $operationType = null;

    /**
     * Current status of the operation (e.g., success, failed).
     *
     * @var string|null
     * @map:Status
     */
    protected $status = null;

    /**
     * Date of the cancellation operation.
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
     * Amount affected by the cancellation (in cents).
     *
     * @var int|null
     * @map:Amount
     */
    protected $amount = null;

    /**
     * Indicates whether 3D Secure was used for the operation.
     *
     * @var bool|null
     * @map:3DSecure
     */
    protected $secure = null;

    /**
     * URL of the cancelled payment page.
     *
     * @var string|null
     * @map:PageUrl
     */
    protected $pageUrl = null;

    /**
     * Email address linked to the transaction.
     *
     * @var string|null
     * @map:Email
     */
    protected $email = null;

    /**
     * Language used for the operation.
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
     * Returns the operation status.
     *
     * @return string|null
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Returns the operation date.
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
     * Returns the amount affected by the cancellation.
     *
     * @return int|null
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Indicates whether 3D Secure was used.
     *
     * @return bool|null
     */
    public function getSecure()
    {
        return $this->secure;
    }

    /**
     * Returns the URL of the cancelled payment page.
     *
     * @return string|null
     */
    public function getPageUrl()
    {
        return $this->pageUrl;
    }

    /**
     * Returns the email address linked to the transaction.
     *
     * @return string|null
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Returns the language used.
     *
     * @return string|null
     */
    public function getLanguage()
    {
        return $this->language;
    }
}
