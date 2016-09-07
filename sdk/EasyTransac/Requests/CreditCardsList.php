<?php

namespace EasyTransac\Requests;

use \EasyTransac\Entities\Entity;

/**
 * API function /payment/listcards, gets the credit cards list
 * @author Klyde
 * @copyright EasyTransac
 */
class CreditCardsList extends Request
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
        return parent::call('/payment/listcards', $entity);
    }
}

?>