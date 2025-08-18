<?php

namespace EasyTransac\Entities;

/**
 * Represents the response for the "payouts" request.
 * This entity exposes the details of payouts made to a user via the EasyTransac API.
 * Official documentation: https://www.easytransac.com/fr/documentation#tag/API-User/paths/~1api~1user~1payouts/post
 */
class PayoutsListResponse extends Entity
{
    /**
     * Unique identifier of the payout.
     *
     * @var string|null
     * @map:Id
     */
    protected $id = null;

    /**
     * Identifier of the user who received the payout.
     *
     * @var string|null
     * @map:UserId
     */
    protected $userId = null;

    /**
     * Payout status (e.g., pending, done, failed).
     *
     * @var string|null
     * @map:Status
     */
    protected $status = null;

    /**
     * Processing date of the payout.
     *
     * @var string|null
     * @map:Date
     */
    protected $date = null;

    /**
     * Transferred amount (in cents).
     *
     * @var int|null
     * @map:Amount
     */
    protected $amount = null;

    /**
     * Currency used (e.g., EUR).
     *
     * @var string|null
     * @map:Currency
     */
    protected $currency = null;

    /**
     * IBAN used to perform the payout.
     *
     * @var string|null
     * @map:Iban
     */
    protected $iban = null;

    /**
     * BIC code of the recipient bank.
     *
     * @var string|null
     * @map:Bic
     */
    protected $bic = null;

    /**
     * Reason or comment associated with the payout.
     *
     * @var string|null
     * @map:Reason
     */
    protected $reason = null;

    /**
     * Returns the payout identifier.
     *
     * @return string|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the user identifier.
     *
     * @return string|null
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Returns the payout status.
     *
     * @return string|null
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Returns the payout date.
     *
     * @return string|null
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Returns the transferred amount.
     *
     * @return int|null
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Returns the currency used.
     *
     * @return string|null
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Returns the beneficiary IBAN.
     *
     * @return string|null
     */
    public function getIban()
    {
        return $this->iban;
    }

    /**
     * Returns the bank BIC code.
     *
     * @return string|null
     */
    public function getBic()
    {
        return $this->bic;
    }

    /**
     * Returns the payout reason/comment.
     *
     * @return string|null
     */
    public function getReason()
    {
        return $this->reason;
    }
}
