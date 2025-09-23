<?php

namespace EasyTransac\Entities;

/**
 * Represents the parameters for the "PaymentRefund" request.
 * This entity configures the fields required to initiate a refund
 * through the EasyTransac API.
 */
class Refund extends Entity
{
    /**
     * Identifier of the transaction to refund.
     *
     * @var string|null
     * @map:Tid
     */
    protected $tid = null;

    /**
     * Language to use for the response (e.g., 'fr', 'en').
     *
     * @var string|null
     * @map:Language
     */
    protected $language = null;

    /**
     * Amount to refund (in cents).
     * If not specified, the full amount will be refunded.
     *
     * @var int|null
     * @map:Amount
     */
    protected $amount = null;

    /**
     * Reason for the refund (optional).
     *
     * @var string|null
     * @map:Reason
     */
    protected $reason = null;

    /**
     * Sets the refund amount.
     *
     * @param int $amount Amount to refund in cents.
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * Sets the refund reason.
     *
     * @param string $reason Reason for the refund (e.g., defective product).
     * @return $this
     */
    public function setReason($reason)
    {
        $this->reason = $reason;
        return $this;
    }

    /**
     * Sets the transaction identifier to refund.
     *
     * @param string $tid Unique transaction identifier.
     * @return $this
     */
    public function setTid($tid)
    {
        $this->tid = $tid;
        return $this;
    }

    /**
     * Sets the response language.
     *
     * @param string $language Language code (e.g., 'fr', 'en').
     * @return $this
     */
    public function setLanguage($language)
    {
        $this->language = $language;
        return $this;
    }
}
