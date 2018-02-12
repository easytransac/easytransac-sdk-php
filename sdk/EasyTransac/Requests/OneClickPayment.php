<?php

namespace EasyTransac\Requests;

use \EasyTransac\Entities\Entity;

/**
 * API function /payment/oneclick, asks for a payment OneClick
 * @author Klyde
 * @copyright EasyTransac
 */
class OneClickPayment extends Request
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
    	
        return $this->call('/payment/oneclick', $entity);
    }
}

?>