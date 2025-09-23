<?php

namespace EasyTransac\Entities;

/**
 * Represents the main arguments for the "makebanktransfer" request.
 * Initializes a bank transfer with customer information, amount, and reference.
 */
class InitBankTransfer extends Entity
{
    /** @object:Customer **/
    protected $customer = null;

    /** @map:Amount **/
    protected $amount = null;

    /** @map:Reference **/
    protected $reference = null;

    /**
     * Sets the customer associated with the bank transfer.
     *
     * @param Customer $customer Customer instance to associate.
     * @return $this Fluent interface.
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;
        return $this;
    }

    /**
     * Sets the bank transfer amount.
     *
     * @param float|int|string $amount Transfer amount.
     * @return $this Fluent interface.
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * Sets the bank transfer reference.
     *
     * @param string $reference Transfer reference.
     * @return $this Fluent interface.
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
        return $this;
    }
}
