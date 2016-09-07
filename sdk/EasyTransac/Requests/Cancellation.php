<?php

namespace EasyTransac\Requests;

use \EasyTransac\Entities\Entity;

/**
 * API function /payment/cancel, asks for the cancellation of a recurring payment
 * @author Klyde
 * @copyright EasyTransac
 */
class Cancellation extends Request
{
    /** @object:CancellationInfos **/
    protected $response;

    /**
     * Calls the API function
     * @param Entity $entity
     * @return \EasyTransac\Responses\StandardResponse
     */
    public function execute(Entity $entity)
    {
        return parent::call('/payment/cancel', $entity);
    }
}

?>