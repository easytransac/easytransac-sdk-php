<?php

namespace EasyTransac\Entities;

/**
 * Represents a peer-to-peer (P2P) transfer between two professionals.
 *
 * This entity describes the parameters of a P2P transfer such as user
 * identifiers, amount, language, etc.
 *
 * @package EasyTransac\Entities
 *
 */
class P2PTransfer extends Entity
{
    /**
     * Identifier of the source account.
     *
     * @var string|null
     * @map:From
     */
    protected $from = null;

    /**
     * Identifier of the destination account.
     *
     * @var string|null
     * @map:To
     */
    protected $to = null;

    /**
     * Transaction identifier.
     *
     * @var string|null
     * @map:Tid
     */
    protected $tid = null;

    /**
     * Transfer amount (in cents).
     *
     * @var int|null
     * @map:Amount
     */
    protected $amount = null;

    /**
     * Transfer description.
     *
     * @var string|null
     * @map:Description
     */
    protected $description = null;

    /**
     * Language used (e.g., 'fr').
     *
     * @var string|null
     * @map:Language
     */
    protected $language = null;

    /**
     * Identifier of the original transaction, if this transfer
     * is related to a previous operation.
     *
     * @var string|null
     * @map:OriginalTid
     */
    protected $originalTid = null;

    /**
     * Transfer status (e.g., 'success', 'failed').
     *
     * @var string|null
     * @map:Status
     */
    protected $status = null;

    /**
     * Transfer date.
     *
     * @var string|null
     * @map:Date
     */
    protected $date = null;

    /**
     * Returns the identifier of the transfer sender.
     *
     * @return string|null
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * Sets the identifier of the transfer sender.
     *
     * @param string $value
     * @return $this
     */
    public function setFrom($value)
    {
        $this->from = $value;
        return $this;
    }

    /**
     * Returns the identifier of the transfer recipient.
     *
     * @return string|null
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * Sets the identifier of the transfer recipient.
     *
     * @param string $value
     * @return $this
     */
    public function setTo($value)
    {
        $this->to = $value;
        return $this;
    }

    /**
     * Sets the transaction identifier.
     *
     * @param string $value
     * @return $this
     */
    public function setTid($value)
    {
        $this->tid = $value;
        return $this;
    }

    /**
     * Returns the transfer amount.
     *
     * @return int|null
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Sets the transfer amount.
     *
     * @param int $value
     * @return $this
     */
    public function setAmount($value)
    {
        $this->amount = $value;
        return $this;
    }

    /**
     * Sets a description for the transfer.
     *
     * @param string $value
     * @return $this
     */
    public function setDescription($value)
    {
        $this->description = $value;
        return $this;
    }

    /**
     * Sets the language of the transfer.
     *
     * @param string $value
     * @return $this
     */
    public function setLanguage($value)
    {
        $this->language = $value;
        return $this;
    }

    /**
     * Returns the transfer date.
     *
     * @return string|null
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Returns the original transaction identifier, if any.
     *
     * @return string|null
     */
    public function getOriginalTid()
    {
        return $this->originalTid;
    }

    /**
     * Returns the transfer status.
     *
     * @return string|null
     */
    public function getStatus()
    {
        return $this->status;
    }
}
