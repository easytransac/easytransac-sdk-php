<?php

namespace EasyTransac\Requests;

use \EasyTransac\Entities\Entity;

/**
 * API function /payment/direct, makes a payment "direct"
 * @author Klyde
 * @copyright EasyTransac
 */
class DirectPayment extends Request
{
    /** @object:DoneTransaction **/
    protected $response;

    /**
     * Calls the API function
     * @param Entity $entity
     * @return \EasyTransac\Responses\StandardResponse
     */
    public function execute(Entity $entity)
    {
        return parent::call('/payment/direct', $entity);
    }
}

?>