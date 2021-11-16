<?php

namespace EasyTransac\Requests;

use EasyTransac\Entities\Entity;

/**
 * API function /payment/cancel, asks for the cancellation of a recurring payment
 * @copyright EasyTransac
 */
class Cancellation extends Request
{
    /** @object:CancellationInfos **/
    protected $response;

    /**
     * {@inheritDoc}
     * @see \EasyTransac\Requests\Request::execute()
     */
    public function execute(Entity $entity)
    {
        return $this->call('/payment/cancel', $entity);
    }
}
