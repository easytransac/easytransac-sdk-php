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
     * Calls the API function
     * @param Entity $entity
     * @return \EasyTransac\Responses\StandardResponse
     */
    public function execute(Entity $entity)
    {
        return parent::call('/payment/oneclick', $entity);
    }
}

?>