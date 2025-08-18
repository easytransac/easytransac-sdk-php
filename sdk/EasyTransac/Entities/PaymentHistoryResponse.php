<?php

namespace EasyTransac\Entities;

/**
 * Represents the response of a payment history request.
 * This entity aggregates the information returned by EasyTransac
 * after querying the payment history.
 *
 * @package EasyTransac\Entities
 */
class PaymentHistoryResponse extends Entity
{
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
     * Type of application that initiated the payment.
     *
     * @var string|null
     * @map:ApplicationType
     */
    protected $applicationType = null;

    /**
     * Transaction ID.
     *
     * @var string|null
     * @map:Tid
     */
    protected $tid = null;

    /**
     * Unique user identifier.
     *
     * @var string|null
     * @map:Uid
     */
    protected $uid = null;

    /**
     * Order identifier.
     *
     * @var string|null
     * @map:OrderId
     */
    protected $orderId = null;

    /**
     * Transaction status (e.g., captured, pending).
     *
     * @var string|null
     * @map:Status
     */
    protected $status = null;

    /**
     * Transaction date.
     *
     * @var string|null
     * @map:Date
     */
    protected $date = null;

    /**
     * Refund date, if any.
     *
     * @var string|null
     * @map:DateRefund
     */
    protected $dateRefund = null;

    /**
     * Chargeback date, if any.
     *
     * @var string|null
     * @map:DateChargeback
     */
    protected $dateChargeback = null;

    /**
     * Representment date, if applicable.
     *
     * @var string|null
     * @map:DateRepresentment
     */
    protected $dateRepresentment = null;

    /**
     * Transaction amount (in cents).
     *
     * @var int|null
     * @map:Amount
     */
    protected $amount = null;

    /**
     * Client IP address.
     *
     * @var string|null
     * @map:ClientIp
     */
    protected $clientIp = null;

    /**
     * Country associated with the client IP.
     *
     * @var string|null
     * @map:ClientIpCountry
     */
    protected $clientIpCountry = null;

    /**
     * ISO currency code.
     *
     * @var string|null
     * @map:Currency
     */
    protected $currency = null;

    /**
     * Human-readable currency name.
     *
     * @var string|null
     * @map:CurrencyText
     */
    protected $currencyText = null;

    /**
     * Fixed fees applied to the transaction.
     *
     * @var float|null
     * @map:FixFees
     */
    protected $fixFees = null;

    /**
     * Additional API message.
     *
     * @var string|null
     * @map:Message
     */
    protected $message = null;

    /**
     * Whether 3D Secure was used.
     *
     * @var bool|null
     * @map:3DSecure
     */
    protected $secure = null;

    /**
     * Whether the transaction is One Click.
     *
     * @var bool|null
     * @map:OneClick
     */
    protected $oneClick = null;

    /**
     * Credit card details used for the transaction.
     *
     * @var CreditCard|null
     * @object:CreditCard
     */
    protected $creditCard = null;

    /**
     * Whether the transaction was performed in test mode.
     *
     * @var bool|null
     * @map:Test
     */
    protected $test = null;

    /**
     * Language used during the transaction.
     *
     * @var string|null
     * @map:Language
     */
    protected $language = null;

    /**
     * Error message, if any.
     *
     * @var string|null
     * @map:Error
     */
    protected $error = null;

    /**
     * Additional error details, if any.
     *
     * @var string|null
     * @map:AdditionalError
     */
    protected $additionalError = null;

    /**
     * Customer information.
     *
     * @var Client|null
     * @object:Client
     */
    protected $client = null;

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
     * Returns the payment method used.
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

    /**
     * Returns the transaction ID.
     *
     * @return string|null
     */
    public function getTid()
    {
        return $this->tid;
    }

    /**
     * Returns the user identifier.
     *
     * @return string|null
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Returns the order identifier.
     *
     * @return string|null
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * Returns the transaction status.
     *
     * @return string|null
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Returns the transaction date.
     *
     * @return string|null
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Returns the refund date.
     *
     * @return string|null
     */
    public function getDateRefund()
    {
        return $this->dateRefund;
    }

    /**
     * Returns the chargeback date.
     *
     * @return string|null
     */
    public function getDateChargeback()
    {
        return $this->dateChargeback;
    }

    /**
     * Returns the representment date.
     *
     * @return string|null
     */
    public function getDateRepresentment()
    {
        return $this->dateRepresentment;
    }

    /**
     * Returns the transaction amount.
     *
     * @return int|null
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Returns the client IP address.
     *
     * @return string|null
     */
    public function getClientIp()
    {
        return $this->clientIp;
    }

    /**
     * Returns the country associated with the client IP.
     *
     * @return string|null
     */
    public function getClientIpCountry()
    {
        return $this->clientIpCountry;
    }

    /**
     * Returns the currency code.
     *
     * @return string|null
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Returns the currency name.
     *
     * @return string|null
     */
    public function getCurrencyText()
    {
        return $this->currencyText;
    }

    /**
     * Returns the fixed fees applied.
     *
     * @return float|null
     */
    public function getFixFees()
    {
        return $this->fixFees;
    }

    /**
     * Returns the response message.
     *
     * @return string|null
     */
    public function getMessage()
    {
        return $this->message;
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
     * Indicates whether the transaction is One Click.
     *
     * @return bool|null
     */
    public function getOneClick()
    {
        return $this->oneClick;
    }

    /**
     * Returns the credit card information.
     *
     * @return CreditCard|null
     */
    public function getCreditCard()
    {
        return $this->creditCard;
    }

    /**
     * Indicates whether the transaction is in test mode.
     *
     * @return bool|null
     */
    public function getTest()
    {
        return $this->test;
    }

    /**
     * Returns the transaction language.
     *
     * @return string|null
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Returns the error message.
     *
     * @return string|null
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * Returns the additional error details.
     *
     * @return string|null
     */
    public function getAdditionalError()
    {
        return $this->additionalError;
    }

    /**
     * Returns the customer information.
     *
     * @return Client|null
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Checks whether the payment was captured.
     *
     * @return bool
     */
    public function isCaptured()
    {
        return $this->status === 'captured';
    }

    /**
     * Checks whether the payment is pending.
     *
     * @return bool
     */
    public function isPending()
    {
        return $this->status === 'pending';
    }
}
