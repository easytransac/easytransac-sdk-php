<?php

namespace EasyTransac\Requests;

use \EasyTransac\Entities\Entity;

/**
 * API function /payment/transfer, make a transfer from your customer account to another customer account
 * @copyright EasyTransac
 */
class MakeP2PTransfer extends Request
{
    /** @object:P2PTransfer **/
    protected $response;

    /**
     * Calls the API function
     * @param Entity $entity
     * @return \EasyTransac\Responses\StandardResponse
     */
    public function execute(Entity $entity)
    {
        return $this->call('/payment/transfer', $entity);
    }
}

?>
