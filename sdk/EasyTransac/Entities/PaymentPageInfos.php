<?php

namespace EasyTransac\Entities;

/**
 * Represents the response of a "PaymentPage" request.
 * This entity contains the information returned when creating
 * a payment page via the EasyTransac API.
 */
class PaymentPageInfos extends Entity
{
    /**
     * Unique identifier of the payment page creation request.
     *
     * @var string|null
     * @map:RequestId
     */
    protected $requestId = null;

    /**
     * Operation type (e.g., debit, credit, refund).
     *
     * @var string|null
     * @map:OperationType
     */
    protected $operationType = null;

    /**
     * Type of application initiating the request (e.g., web, api).
     *
     * @var string|null
     * @map:ApplicationType
     */
    protected $applicationType = null;

    /**
     * Current status of the payment page (e.g., created, expired).
     *
     * @var string|null
     * @map:Status
     */
    protected $status = null;

    /**
     * Creation date of the payment page.
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
     * Amount displayed/expected on the payment page (in cents).
     *
     * @var int|null
     * @map:Amount
     */
    protected $amount = null;

    /**
     * Indicates whether 3D Secure is enabled for the transaction.
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
     * Customer email address associated with the transaction.
     *
     * @var string|null
     * @map:Email
     */
    protected $email = null;

    /**
     * Language used on the payment page.
     *
     * @var string|null
     * @map:Language
     */
    protected $language = null;

    /**
     * Indicates whether the transaction is live (production) or test.
     *
     * @var bool|null
     * @map:Live
     */
    protected $live = null;

    /**
     * Planned payment method (e.g., CB, SEPA).
     *
     * @var string|null
     * @map:PaymentMethod
     */
    protected $paymentMethod = null;

    /**
     * Returns the unique request identifier.
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
     * Returns the current status of the payment page.
     *
     * @return string|null
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Returns the creation date of the payment page.
     *
     * @return string|null
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Returns the date when the request was sent.
     *
     * @return string|null
     */
    public function getDateSent()
    {
        return $this->dateSent;
    }

    /**
     * Returns the amount associated with the payment page.
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
     * Returns the email address associated with the transaction.
     *
     * @return string|null
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Returns the language used on the payment page.
     *
     * @return string|null
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Indicates whether the transaction is in a live environment.
     *
     * @return bool|null
     */
    public function getLive()
    {
        return $this->live;
    }

    /**
     * Returns the planned payment method.
     *
     * @return string|null
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * Returns the application type.
     *
     * @return string|null
     */
    public function getApplicationType()
    {
        return $this->applicationType;
    }
}
