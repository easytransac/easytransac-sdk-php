<?php

namespace EasyTransac\Entities;

/**
 * Represents the response of the request "cancellation"
 * @author klyde
 * @copyright EasyTransac
 */
class CancellationInfos extends Entity
{
	/** @map:Tid **/
	protected $tid = null;
    /** @map:OriginalPaymentTid **/
    protected $originalPaymentTid = null;
    /** @map:Date **/
    protected $date = null;
    /** @map:Message **/
    protected $message = null;

	public function getTid()
	{
		return $this->tid;
	}

    public function getOriginalPaymentTid()
    {
        return $this->originalPaymentTid;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getMessage()
    {
        return $this->message;
    }
}

?>