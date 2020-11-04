<?php

namespace EasyTransac\Entities;

/**
 * This is the main argument for the makebanktransfer request
 * @author klyde
 * @copyright EasyTransac
 */
class InitBankTransfer extends Entity
{
	/** @object:Customer **/
	protected $customer = null;
	/** @map:Amount **/
	protected $amount = null;
	/** @map:Reference **/
	protected $reference = null;
	
	public function setCustomer($customer)
	{
		$this->customer = $customer;
		return $this;
	}

	public function setAmount($amount)
	{
		$this->amount = $amount;
		return $this;
	}

	public function setReference($reference)
	{
		$this->reference = $reference;
		return $this;
	}
}

?>