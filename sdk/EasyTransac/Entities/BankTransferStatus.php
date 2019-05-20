<?php

namespace EasyTransac\Entities;

/**
 * This is the main argument for /payout/status request
 * @author klyde
 * @copyright EasyTransac
 */
class BankTransferStatus extends Entity
{
	/** @object:Customer **/
	protected $customer = null;
	/** @map:PayoutId **/
	protected $payoutId = null;
	
	public function getId()
	{
		return $this->id;
	}

	public function getPayoutId()
	{
		return $this->payoutId;
	}

	public function setId($id)
	{
		$this->id = $id;
		return $this;
	}

	public function setPayoutId($payoutId)
	{
		$this->payoutId = $payoutId;
		return $this;
	}
}

?>