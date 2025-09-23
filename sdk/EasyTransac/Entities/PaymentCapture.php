<?php

namespace EasyTransac\Entities;

/**
 * Represents the arguments for the "Capture" request
 * (capturing a pre-authorized payment).
 */
class PaymentCapture extends Entity
{
    /**
     * Unique identifier of the transaction to capture.
     *
     * @var string|null
     * @map:Tid
     */
    protected $tid = null;

    /**
     * Amount to capture (in cents).
     *
     * @var int|null
     * @map:Amount
     */
    protected $amount = null;

    /**
     * Request language (e.g., 'fr', 'en').
     *
     * @var string|null
     * @map:Language
     */
    protected $language = null;

    /**
     * Sets the amount to capture.
     *
     * @param int $amount Amount in cents.
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * Sets the transaction identifier to capture.
     *
     * @param string $tid Transaction identifier.
     * @return $this
     */
    public function setTid($tid)
    {
        $this->tid = $tid;
        return $this;
    }

    /**
     * Sets the request language.
     *
     * @param string $language Language code (e.g., 'fr').
     * @return $this
     */
    public function setLanguage($language)
    {
        $this->language = $language;
        return $this;
    }
}
