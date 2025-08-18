<?php

namespace EasyTransac\Entities;

/**
 * Represents the response to a "cancellation" (transaction reversal) request.
 *
 * This entity contains the information returned after a transaction
 * cancellation through the EasyTransac API.
 *
 * @package EasyTransac\Entities
 * 
 */
class CancellationInfos extends Entity
{
    /**
     * Identifier (TID) of the cancellation transaction.
     *
     * @var string|null
     * @map:Tid
     */
    protected $tid = null;

    /**
     * Identifier (TID) of the original payment transaction before cancellation.
     *
     * @var string|null
     * @map:OriginalPaymentTid
     */
    protected $originalPaymentTid = null;

    /**
     * Date of the cancellation operation.
     *
     * Expected format: YYYY-MM-DD HH:MM:SS
     *
     * @var string|null
     * @map:Date
     */
    protected $date = null;

    /**
     * Message associated with the cancellation response
     * (may include a status or explanation).
     *
     * @var string|null
     * @map:Message
     */
    protected $message = null;

    /**
     * Returns the identifier of the cancellation transaction.
     *
     * @return string|null
     */
    public function getTid()
    {
        return $this->tid;
    }

    /**
     * Returns the identifier of the original (pre-cancellation) transaction.
     *
     * @return string|null
     */
    public function getOriginalPaymentTid()
    {
        return $this->originalPaymentTid;
    }

    /**
     * Returns the cancellation date.
     *
     * @return string|null Date in format YYYY-MM-DD HH:MM:SS
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Returns the informational message associated with the response.
     *
     * @return string|null
     */
    public function getMessage()
    {
        return $this->message;
    }
}
