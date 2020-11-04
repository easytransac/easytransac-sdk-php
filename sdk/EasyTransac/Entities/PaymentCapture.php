<?php

namespace EasyTransac\Entities;

/**
 * Represents arguments of the request "Capture"
 * @author klyde
 * @copyright EasyTransac
 */
class PaymentCapture extends Entity
{
	/** @map:Tid **/
	protected $tid = null;
	/** @map:Amount **/
	protected $amount = null;
	/** @map:Language **/
	protected $language = null;

	public function setAmount($amount)
	{
		$this->amount = $amount;
		return $this;
	}

	public function setTid($tid)
	{
		$this->tid = $tid;
		return $this;
	}

	public function setLanguage($language)
	{
		$this->language = $language;
		return $this;
	}
}

?>