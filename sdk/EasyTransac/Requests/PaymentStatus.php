<?php

namespace EasyTransac\Requests;

use \EasyTransac\Entities\Entity;

/**
 * API function /payment/status, requests for a payment status
 * @author Klyde
 * @copyright EasyTransac
 */
class PaymentStatus extends Request
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
    	];
    	
        return $this->call('/payment/status', $entity);
    }
}

?>