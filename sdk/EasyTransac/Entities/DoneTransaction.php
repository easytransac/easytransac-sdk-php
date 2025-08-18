<?php

namespace EasyTransac\Entities;

/**
 * Represents the response for the "DirectPayment", "OneClickPayment",
 * "PaymentStatus", and "PaymentRefund" requests.
 *
 * This entity aggregates all information related to a transaction
 * performed via EasyTransac.
 */
class DoneTransaction extends Entity
{
    /** @map:RequestId **/
    protected $requestId = null;

    /** @map:OriginalRequestId **/
    protected $originalRequestId = null;

    /** @map:RequestAttempt **/
    protected $requestAttempt = null;

    /** @map:OperationType **/
    protected $operationType = null;

    /** @map:PaymentMethod **/
    protected $paymentMethod = null;

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

    /** @map:AmountRefund **/
    protected $amountRefund = null;

    /** @map:DateChargeback **/
    protected $dateChargeback = null;

    /** @map:DateRepresentment **/
    protected $dateRepresentment = null;

    /** @map:Amount **/
    protected $amount = null;

    /** @map:FixFees **/
    protected $fixFees = null;

    /** @map:Message **/
    protected $message = null;

    /** @map:3DSecure **/
    protected $secure = null;

    /** @map:OneClick **/
    protected $oneClick = null;

    /** @map:MultiplePayments **/
    protected $multiplePayments = null;

    /** @map:Rebill **/
    protected $rebill = null;

    /** @map:OriginalPaymentTid **/
    protected $originalPaymentTid = null;

    /** @map:Alias **/
    protected $alias = null;

    /** @map:Error **/
    protected $error = null;

    /** @map:AdditionalError **/
    protected $additionalError = null;

    /** @map:3DSecureUrl **/
    protected $secureUrl = null;

    /** @object:Client **/
    protected $client = null;

    /** @map:MandateUrl **/
    protected $mandateUrl = null;

    /** @map:RedirectUrl **/
    protected $redirectUrl = null;

    /** @map:Test **/
    protected $test = null;

    /**
     * Returns the 3D Secure URL, if available.
     *
     * @return string|null 3DS URL or null if unavailable.
     */
    public function getSecureUrl()
    {
        return $this->secureUrl;
    }

    /**
     * Returns the number of request attempts.
     *
     * @return int|null Number of attempts or null.
     */
    public function getRequestAttempt()
    {
        return $this->requestAttempt;
    }

    /**
     * Returns the original request identifier.
     *
     * @return string|null Original request ID or null.
     */
    public function getOriginalRequestId()
    {
        return $this->originalRequestId;
    }

    /**
     * Returns the transaction operation type.
     *
     * @return string|null Operation type or null.
     */
    public function getOperationType()
    {
        return $this->operationType;
    }

    /**
     * Returns the additional error message, if any.
     *
     * @return string|null Additional error message or null.
     */
    public function getAdditionalError()
    {
        return $this->additionalError;
    }

    /**
     * Returns the error message, if any.
     *
     * @return string|null Error message or null.
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * Returns the transaction alias.
     *
     * @return string|null Alias or null.
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * Returns the original payment TID.
     *
     * @return string|null Original payment TID or null.
     */
    public function getOriginalPaymentTid()
    {
        return $this->originalPaymentTid;
    }

    /**
     * Indicates whether the transaction is a rebill.
     *
     * @return bool|null True if rebill, otherwise null.
     */
    public function getRebill()
    {
        return $this->rebill;
    }

    /**
     * Indicates whether the transaction is part of multiple payments.
     *
     * @return bool|null True if multiple payments, otherwise null.
     */
    public function getMultiplePayments()
    {
        return $this->multiplePayments;
    }

    /**
     * Indicates whether the transaction is a OneClick payment.
     *
     * @return bool|null True if OneClick, otherwise null.
     */
    public function getOneClick()
    {
        return $this->oneClick;
    }

    /**
     * Indicates whether the transaction used 3D Secure.
     *
     * @return bool|null True if 3D Secure, otherwise null.
     */
    public function getSecure()
    {
        return $this->secure;
    }

    /**
     * Returns the message associated with the transaction.
     *
     * @return string|null Message or null.
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Returns the fixed fees applied to the transaction.
     *
     * @return float|null Fixed fee amount or null.
     */
    public function getFixFees()
    {
        return $this->fixFees;
    }

    /**
     * Returns the transaction amount.
     *
     * @return float|null Amount or null.
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Returns the representment date (in case of dispute).
     *
     * @return string|null Representment date or null.
     */
    public function getDateRepresentment()
    {
        return $this->dateRepresentment;
    }

    /**
     * Returns the chargeback date.
     *
     * @return string|null Chargeback date or null.
     */
    public function getDateChargeback()
    {
        return $this->dateChargeback;
    }

    /**
     * Returns the refund date.
     *
     * @return string|null Refund date or null.
     */
    public function getDateRefund()
    {
        return $this->dateRefund;
    }

    /**
     * Returns the refunded amount.
     *
     * @return float|null Refunded amount or null.
     */
    public function getAMountRefund()
    {
        return $this->amountRefund;
    }

    /**
     * Returns the transaction date.
     *
     * @return string|null Date or null.
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Returns the transaction status.
     *
     * @return string|null Status or null.
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Returns the associated order identifier.
     *
     * @return string|null OrderId or null.
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * Returns the user identifier.
     *
     * @return string|null Uid or null.
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Returns the transaction identifier.
     *
     * @return string|null Tid or null.
     */
    public function getTid()
    {
        return $this->tid;
    }

    /**
     * Returns the request identifier.
     *
     * @return string|null RequestId or null.
     */
    public function getRequestId()
    {
        return $this->requestId;
    }

    /**
     * Returns the SEPA mandate URL, if available.
     *
     * @return string|null Mandate URL or null.
     */
    public function getMandateUrl()
    {
        return $this->mandateUrl;
    }

    /**
     * Returns the redirect URL, if available.
     *
     * @return string|null Redirect URL or null.
     */
    public function getRedirectUrl()
    {
        return $this->redirectUrl;
    }

    /**
     * Indicates whether the transaction is in test mode.
     *
     * @return bool|null True if test, otherwise null.
     */
    public function getTest()
    {
        return $this->test;
    }

    /**
     * Returns the payment method used.
     *
     * @return string|null Payment method or null.
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * Returns the client associated with the transaction.
     *
     * @return Client|null Client object or null.
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Indicates whether the transaction is captured.
     *
     * @return bool True if captured, otherwise false.
     */
    public function isCaptured()
    {
        return $this->status === 'captured';
    }

    /**
     * Indicates whether the transaction is pending.
     *
     * @return bool True if pending, otherwise false.
     */
    public function isPending()
    {
        return $this->status === 'pending';
    }
}
