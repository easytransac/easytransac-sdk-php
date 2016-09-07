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
    /** @object:CreditCardsList **/
    protected $response;

    /**
     * Calls the API function
     * @param Entity $entity
     * @return \EasyTransac\Responses\StandardResponse
     */
    public function execute(Entity $entity)
    {
        return parent::call('/payment/addcard', $entity);
    }
}

?>