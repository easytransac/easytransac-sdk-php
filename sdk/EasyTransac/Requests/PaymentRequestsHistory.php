<?php

namespace EasyTransac\Requests;

use EasyTransac\Entities\Entity;

/**
 * API function /payment/refund, asks for a refund
 * URL: https://www.easytransac.com/fr/documentation#tag/API-Payment/paths/~1api~1payment~1history/post
 * @copyright EasyTransac
 */
class PaymentRequestsHistory extends Request
{
    /** @object:PaymentRequestsHistoryResponse **/
    protected $response;

    /**
     * {@inheritDoc}
     * @param \Easytransac\Entities\PaymentRequestsHistoryRequest
     * @see \EasyTransac\Requests\Request::execute()
     */
    public function execute(Entity $entity)
    {
        return $this->call('/payment/requests', $entity);
    }
}
