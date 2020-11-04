<?php

namespace EasyTransac\Entities;

/**
 * Represents Transfer pro to pro
 * @author klyde
 * @copyright EasyTransac
 */
class P2PTransfer extends Entity
{
	/** @map:From **/
	protected $from = null;
	/** @map:To **/
	protected $to = null;
	/** @map:Tid **/
	protected $tid = null;
	/** @map:Amount **/
	protected $amount = null;
	/** @map:Description **/
	protected $description = null;
	/** @map:Language **/
	protected $language = null;
	/** @map:OriginalTid **/
	protected $originalTid = null;
	/** @map:Status **/
	protected $status = null;
	/** @map:Date **/
	protected $date = null;

	public function getFrom()
	{
		return $this->from;
	}

	public function setFrom($value)
	{
		$this->from = $value;
		return $this;
	}

	public function getTo()
	{
		return $this->to;
	}

	public function setTo($value)
	{
		$this->to = $value;
		return $this;
	}

	public function setTid($value)
	{
		$this->tid = $value;
		return $this;
	}

	public function getAmount()
	{
		return $this->amount;
	}

	public function setAmount($value)
	{
		$this->amount = $value;
		return $this;
	}

	public function setDescription($value)
	{
		$this->description = $value;
		return $this;
	}

	public function setLanguage($value)
	{
		$this->language = $value;
		return $this;
	}

	public function getDate()
	{
		return $this->date;
	}

	public function getOriginalTid()
	{
		return $this->originalTid;
	}

	public function getStatus()
	{
		return $this->status;
	}
}
