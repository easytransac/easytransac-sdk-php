<?php

namespace EasyTransac\Entities;

/**
 * Represents arguments of the request "OneClickPayment"
 * @author klyde
 * @copyright EasyTransac
 */
class OneClickTransaction extends Entity
{
    /** @map:Amount **/
    protected $amount = null;
    /** @map:Uid **/
    protected $uid = null;
    /** @map:OrderId **/
    protected $orderId = null;
    /** @map:Description **/
    protected $description = null;
    /** @map:ClientIp **/
    protected $clientIp = null;
    /** @map:Alias **/
    protected $alias = null;

    public function setAlias($value)
    {
        $this->alias = $value;
        return $this;
    }

    public function getAlias()
    {
        return $this->alias;
    }

    public function setClientIp($value)
    {
        $this->clientIp = $value;
        return $this;
    }

    public function getClientIp()
    {
        return $this->clientIp;
    }

    public function setDescription($value)
    {
        $this->description = $value;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setOrderId($value)
    {
        $this->orderId = $value;
        return $this;
    }

    public function getOrderId()
    {
        return $this->orderId;
    }

    public function setUid($value)
    {
        $this->uid = $value;
        return $this;
    }

    public function getUid()
    {
        return $this->uid;
    }

    public function setAmount($value)
    {
        $this->amount = $value;
        return $this;
    }

    public function getAmount()
    {
        return $this->amount;
    }
}

?>