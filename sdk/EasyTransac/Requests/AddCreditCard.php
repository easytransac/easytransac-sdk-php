<?php

namespace EasyTransac\Requests;

use \EasyTransac\Entities\Entity;

/**
 * API function /payment/addcard, add a credit card
 * @author Klyde
 * @copyright EasyTransac
 */
class AddCreditCard extends Request
{
    /** @object:CreditCard **/
    protected $response;

    /**
     * Calls the API function
     * @param Entity $entity
     * @return \EasyTransac\Responses\StandardResponse
     */
    public function execute(Entity $entity)
    {
    	$this->requiredFields = [
    		'Alias',
    		'CardNumber',
   			'CardMonth',
   			'CardYear',
    		'CardType',
    		'LastAccessed',
    	];
    	
        return $this->call('/payment/addcard', $entity);
    }
}

?>