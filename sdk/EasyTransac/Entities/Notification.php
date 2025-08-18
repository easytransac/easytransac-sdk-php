<?php

namespace EasyTransac\Entities;

/**
 * Represents a payment notification received by EasyTransac.
 *
 * This entity encapsulates all data from a notification sent when a transaction
 * changes state: confirmation, cancellation, refund, chargeback, etc.
 *
 * @package EasyTransac\Entities
 * 
 */
class Notification extends Entity
{
    /**
     * Type of notification received (e.g., 'payment', 'refund', etc.).
     *
     * @var string|null
     * @map:NotificationType
     */
    protected $notificationType = null;

    /**
     * Type of operation concerned (e.g., 'credit', 'debit').
     *
     * @var string|null
     * @map:OperationType
     */
    protected $operationType = null;

    /**
     * Unique request identifier.
     *
     * @var string|null
     * @map:RequestId
     */
    protected $requestId = null;

    /**
     * Unique transaction identifier (TID).
     *
     * @var string|null
     * @map:Tid
     */
    protected $tid = null;

    /**
     * Unique customer identifier (UID).
     *
     * @var string|null
     * @map:Uid
     */
    protected $uid = null;

    /**
     * Partner order identifier.
     *
     * @var string|null
     * @map:OrderId
     */
    protected $orderId = null;

    /**
     * Current transaction status (e.g., 'success', 'refused').
     *
     * @var string|null
     * @map:Status
     */
    protected $status = null;

    /**
     * Transaction or notification date.
     *
     * @var string|null
     * @map:Date
     */
    protected $date = null;

    /**
     * Transaction amount (in cents).
     *
     * @var int|null
     * @map:Amount
     */
    protected $amount = null;

    /**
     * Currency used (ISO 4217 code, e.g., 'EUR').
     *
     * @var string|null
     * @map:Currency
     */
    protected $currency = null;

    /**
     * Fixed fees applied.
     *
     * @var int|null
     * @map:FixFees
     */
    protected $fixFees = null;

    /**
     * Error message or additional information.
     *
     * @var string|null
     * @map:Message
     */
    protected $message = null;

    /**
     * Indicates whether the transaction used 3D Secure.
     *
     * @var bool|null
     * @map:3DSecure
     */
    protected $secure = null;

    /**
     * Indicates whether OneClick was used.
     *
     * @var bool|null
     * @map:OneClick
     */
    protected $oneClick = null;

    /**
     * Alias of the card used.
     *
     * @var string|null
     * @map:Alias
     */
    protected $alias = null;

    /**
     * Partial (masked) card number.
     *
     * @var string|null
     * @map:CardNumber
     */
    protected $cardNumber = null;

    /**
     * Indicates whether the transaction was a test.
     *
     * @var bool|null
     * @map:Test
     */
    protected $test = null;

    /**
     * Notification validation signature.
     *
     * @var string|null
     * @map:Signature
     */
    protected $signature = null;

    /**
     * Customer data (Client object).
     *
     * @var Client|null
     * @object:Client
     */
    protected $client = null;

    /**
     * Error message returned by the API.
     *
     * @var string|null
     * @map:Error
     */
    protected $error = null;

    /**
     * Refunded amount, if any.
     *
        * @var int|null
     * @map:AmountRefund
     */
    protected $amountRefund = null;

    /**
     * Number of request attempts.
     *
     * @var int|null
     * @map:RequestAttempt
     */
    protected $requestAttempt = null;

    /**
     * Payment method used (e.g., CB, SEPA).
     *
     * @var string|null
     * @map:PaymentMethod
     */
    protected $paymentMethod = null;

    /**
     * User identifier.
     *
     * @var string|null
     * @map:UserId
     */
    protected $userId = null;

    /**
     * Description associated with the transaction.
     *
     * @var string|null
     * @map:Description
     */
    protected $description = null;

    /**
     * Refund date, if applicable.
     *
     * @var string|null
     * @map:DateRefund
     */
    protected $dateRefund = null;

    /**
     * Full currency name (e.g., 'euro').
     *
     * @var string|null
     * @map:CurrencyText
     */
    protected $currencyText = null;

    /**
     * Currency symbol (e.g., '€').
     *
     * @var string|null
     * @map:CurrencySymbol
     */
    protected $currencySymbol = null;

    /**
     * Percentage fee applied.
     *
     * @var float|null
     * @map:FeesPercent
     */
    protected $feesPercent = null;

    /**
     * Fixed part of the applied fees.
     *
     * @var int|null
     * @map:FeesFixedPart
     */
    protected $feesFixedPart = null;

    /**
     * Card issuing country.
     *
     * @var string|null
     * @map:CardCountry
     */
    protected $cardCountry = null;

    /**
     * Card expiration month.
     *
     * @var string|null
     * @map:CardMonth
     */
    protected $cardMonth = null;

    /**
     * Card expiration year.
     *
     * @var string|null
     * @map:CardYear
     */
    protected $cardYear = null;

    /**
     * Type of application that initiated the transaction (e.g., API, BackOffice).
     *
     * @var string|null
     * @map:ApplicationType
     */
    protected $applicationType = null;

    /**
     * Identifier of the original request (in case of refund or rebill).
     *
     * @var string|null
     * @map:OriginalRequestId
     */
    protected $originalRequestId = null;

    /**
     * Identifier of the initial payment transaction.
     *
     * @var string|null
     * @map:OriginalPaymentTid
     */
    protected $originalPaymentTid = null;

    /**
     * Chargeback date, if occurred.
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
     * Pre-authorized amount.
     *
     * @var int|null
     * @map:AmountPreAuth
     */
    protected $amountPreAuth = null;

    /**
     * Client IP address.
     *
     * @var string|null
     * @map:ClientIP
     */
    protected $clientIP = null;

    /**
     * Country of the client IP address.
     *
     * @var string|null
     * @map:ClientIPCountry
     */
    protected $clientIPCountry = null;

    /**
     * Indicates whether the transaction is a pre-authorization.
     *
     * @var bool|null
     * @map:PreAuth
     */
    protected $preAuth = null;

    /**
     * Indicates whether the transaction is B2B.
     *
     * @var bool|null
     * @map:B2B
     */
    protected $b2b = null;

    /**
     * Type of card used (Visa, MasterCard, etc.).
     *
     * @var string|null
     * @map:CardType
     */
    protected $cardType = null;

    /**
     * Indicates whether a multiple-payment schedule is in progress.
     *
     * @var bool|null
     * @map:MultiplePayments
     */
    protected $multiplePayments = null;

    /**
     * Status of the multiple-payment schedule.
     *
     * @var string|null
     * @map:MultiplePaymentsStatus
     */
    protected $multiplePaymentsStatus = null;

    /**
     * Recurrence of the multiple-payment schedule.
     *
     * @var string|null
     * @map:MultiplePaymentsRecurrence
     */
    protected $multiplePaymentsRecurrence = null;

    /**
     * Number of repetitions of the multiple-payment schedule.
     *
     * @var int|null
     * @map:MultiplePaymentsRepeat
     */
    protected $multiplePaymentsRepeat = null;

    /**
     * Total number of planned multiple payments.
     *
     * @var int|null
     * @map:MultiplePaymentsCount
     */
    protected $multiplePaymentsCount = null;

    /**
     * Rebill (recurring payment) status.
     *
     * @var string|null
     * @map:RebillStatus
     */
    protected $rebillStatus = null;

    /**
     * Rebill frequency (e.g., 'monthly').
     *
     * @var string|null
     * @map:RebillRecurrence
     */
    protected $rebillRecurrence = null;

    /**
     * Number of rebill repetitions performed.
     *
     * @var int|null
     * @map:RebillCount
     */
    protected $rebillCount = null;

    /**
     * Additional error provided by the API.
     *
     * @var string|null
     * @map:AdditionalError
     */
    protected $additionalError = null;

    /**
     * Redirect URL to 3D Secure.
     *
     * @var string|null
     * @map:3DSecureUrl
     */
    protected $secureUrl = null;

    /**
     * SEPA mandate URL.
     *
     * @var string|null
     * @map:MandateUrl
     */
    protected $mandateUrl = null;

    /**
     * General redirect URL.
     *
     * @var string|null
     * @map:RedirectUrl
     */
    protected $redirectUrl = null;

    /**
     * Base64 image of a payment QR code.
     *
     * @var string|null
     * @map:QRCodeImage
     */
    protected $qrCodeImage = null;

    /**
     * URL to the payment QR code.
     *
     * @var string|null
     * @map:QRCodeUrl
     */
    protected $qrCodeUrl = null;

    // Getters are kept below for read access to the properties.

    public function getNotificationType()
    {
        return $this->notificationType;
    }

    public function getOperationType()
    {
        return $this->operationType;
    }

    public function getRequestId()
    {
        return $this->requestId;
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

    public function getAmount()
    {
        return $this->amount;
    }

    public function getCurrency()
    {
        return $this->currency;
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

    public function getAlias()
    {
        return $this->alias;
    }

    public function getCardNumber()
    {
        return $this->cardNumber;
    }

    public function getTest()
    {
        return $this->test;
    }

    public function getSignature()
    {
        return $this->signature;
    }

    public function getClient()
    {
        return $this->client;
    }

    public function getError()
    {
        return $this->error;
    }

    public function getAmountRefund()
    {
        return $this->amountRefund;
    }

    public function getRequestAttempt()
    {
        return $this->requestAttempt;
    }

    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getDateRefund()
    {
        return $this->dateRefund;
    }

    public function getCurrencyText()
    {
        return $this->currencyText;
    }

    public function getCurrencySymbol()
    {
        return $this->currencySymbol;
    }

    public function getFeesPercent()
    {
        return $this->feesPercent;
    }

    public function getFeesFixedPart()
    {
        return $this->feesFixedPart;
    }

    public function getCardCountry()
    {
        return $this->cardCountry;
    }

    public function getCardMonth()
    {
        return $this->cardMonth;
    }

    public function getCardYear()
    {
        return $this->cardYear;
    }

    public function getApplicationType()
    {
        return $this->applicationType;
    }

    public function getOriginalRequestId()
    {
        return $this->originalRequestId;
    }

    public function getOriginalPaymentTid()
    {
        return $this->originalPaymentTid;
    }

    public function getDateChargeback()
    {
        return $this->dateChargeback;
    }

    public function getDateRepresentment()
    {
        return $this->dateRepresentment;
    }

    public function getAmountPreAuth()
    {
        return $this->amountPreAuth;
    }

    public function getClientIP()
    {
        return $this->clientIP;
    }

    public function getClientIPCountry()
    {
        return $this->clientIPCountry;
    }

    public function getPreAuth()
    {
        return $this->preAuth;
    }

    public function getB2b()
    {
        return $this->b2b;
    }

    public function getCardType()
    {
        return $this->cardType;
    }

    public function getMultiplePayments()
    {
        return $this->multiplePayments;
    }

    public function getMultiplePaymentsStatus()
    {
        return $this->multiplePaymentsStatus;
    }

    public function getMultiplePaymentsRecurrence()
    {
        return $this->multiplePaymentsRecurrence;
    }

    public function getMultiplePaymentsRepeat()
    {
        return $this->multiplePaymentsRepeat;
    }

    public function getMultiplePaymentsCount()
    {
        return $this->multiplePaymentsCount;
    }

    public function getRebillStatus()
    {
        return $this->rebillStatus;
    }

    public function getRebillRecurrence()
    {
        return $this->rebillRecurrence;
    }

    public function getRebillCount()
    {
        return $this->rebillCount;
    }

    public function getAdditionalError()
    {
        return $this->additionalError;
    }

    public function getSecureUrl()
    {
        return $this->secureUrl;
    }

    public function getMandateUrl()
    {
        return $this->mandateUrl;
    }

    public function getRedirectUrl()
    {
        return $this->redirectUrl;
    }

    public function getQrCodeImage()
    {
        return $this->qrCodeImage;
    }

    public function getQrCodeUrl()
    {
        return $this->qrCodeUrl;
    }
}
