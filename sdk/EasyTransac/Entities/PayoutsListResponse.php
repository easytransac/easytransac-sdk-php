<?php

namespace EasyTransac\Entities;

/**
 * Represents the response of payouts
 * URL: https://www.easytransac.com/fr/documentation#tag/API-User/paths/~1api~1user~1payouts/post
 * @copyright EasyTransac
 */
class PayoutsListResponse extends Entity
{
    /** @map:Id **/
    protected $id = null;

    /** @map:UserId **/
    protected $userId = null;

    /** @map:Status **/
    protected $status = null;

    /** @map:Date **/
    protected $date = null;

    /** @map:Amount **/
    protected $amount = null;

    /** @map:Currency **/
    protected $currency = null;

    /** @map:Iban **/
    protected $iban = null;

    /** @map:Bic **/
    protected $bic = null;

    /** @map:Reason **/
    protected $reason = null;

    public function getId()
    {
        return $this->id;
    }

    public function getUserId()
    {
        return $this->userId;
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

    public function getIban()
    {
        return $this->iban;
    }

    public function getBic()
    {
        return $this->bic;
    }

    public function getReason()
    {
        return $this->reason;
    }
}
