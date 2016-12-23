<?php

namespace EasyTransac\Requests;

use \EasyTransac\Entities\Entity;

/**
 * API function /payment/debit, makes a payment by "debit"
 * @author Klyde
 * @copyright EasyTransac
 */
class DebitPayment extends Request
{
    /** @object:DoneTransaction **/
    protected $response;

    /**
     * {@inheritDoc}
     * @see \EasyTransac\Requests\Request::execute()
     */
    public function execute(Entity $entity)
    {
    	$this->requiredFields = [
    		'Tid',
    		'Status',
    		'Date',
   			'Amount',
    		'FixFees',
    		'Message',
    		'3DSecure',
  			'OneClick',
    	];
    	
        return $this->call('/payment/debit', $entity);
    }
}

?>