<?php

namespace EasyTransac\Requests;

use \EasyTransac\Entities\Entity;

/**
 * API function /client/payout/list, get the status of a bank transfer
 * @author Klyde
 * @copyright EasyTransac
 */
class BankTransfersStatus extends Request
{
    /** @array:BankTransferInfos **/
    protected $response;

    /**
     * Calls the API function
     * @param Entity $entity
     * @return \EasyTransac\Responses\StandardResponse
     */
    public function execute(Entity $entity)
    {
        return $this->call('/client/payout/status', $entity);
    }
}

?>