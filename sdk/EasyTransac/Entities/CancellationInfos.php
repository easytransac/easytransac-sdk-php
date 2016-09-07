<?php

namespace EasyTransac\Entities;

/**
 * Represents the response of the request "cancellation"
 * @author klyde
 * @copyright EasyTransac
 */
class CancellationInfos extends Entity
{
    /** @map:OriginalPaymentTid **/
    protected $originalPaymentTid = null;
    /** @map:Date **/
    protected $date = null;
    /** @map:Message **/
    protected $message = null;

    public function getOriginalPaymentTid()
    {
        return $this->originalPaymentTid;
    }

    public function setOriginalPaymentTid($originalPaymentTid)
    {
        $this->originalPaymentTid = $originalPaymentTid;
        return $this;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }
}

?>