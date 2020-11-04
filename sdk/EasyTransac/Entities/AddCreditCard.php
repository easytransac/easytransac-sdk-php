<?php

namespace EasyTransac\Entities;

/**
 * Represents arguments of the request "AddCreditCard"
 * @author Klyde
 * @copyright EasyTransac
 */
class AddCreditCard extends Entity
{
    /** @object:Customer **/
    protected $customer = null;
    /** @object:CreditCard **/
    protected $creditCard = null;
    /** @map:Language **/
    protected $language = null;
    /** @map:ClientIp **/
    protected $clientIp = null;

    public function __construct()
    {
    	parent::__construct();
    	
    	if (isset($_SERVER['REMOTE_ADDR']) && !empty($_SERVER['REMOTE_ADDR']))
    		$this->setClientIp($_SERVER['REMOTE_ADDR']);
    }

    public function setCustomer(Entity $customer)
    {
        $this->customer = $customer;
        return $this;
    }

    public function setCreditCard(Entity $creditCard)
    {
        $this->creditCard = $creditCard;
        return $this;
    }

    public function setLanguage($language)
    {
        $this->language = $language;
        return $this;
    }

    public function setClientIp($clientIp)
    {
        $this->clientIp = $clientIp;
        return $this;
    }
}

?>