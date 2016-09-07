<?php

namespace EasyTransac\Requests;

use \EasyTransac\Entities\Entity;

/**
 * API function /payment/page, asks for the external payment page
 * @author Klyde
 * @copyright EasyTransac
 */
class PaymentPage extends Request
{
    /** @object:PaymentPageInfos **/
    protected $response;

    /**
     * Calls the API function
     * @param Entity $entity
     * @return \EasyTransac\Responses\StandardResponse
     */
    public function execute(Entity $entity)
    {
        return parent::call('/payment/page', $entity);
    }
}

?>