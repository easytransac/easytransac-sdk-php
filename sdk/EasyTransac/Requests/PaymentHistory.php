<?php

namespace EasyTransac\Requests;

use EasyTransac\Entities\Entity;

/**
 * API function /payment/page, asks for the external payment page
 * URL: https://www.easytransac.com/fr/documentation#tag/API-Payment/paths/~1api~1payment~1history/post
 * @copyright EasyTransac
 */
class PaymentHistory extends Request
{
    /** @object:PaymentHistoryResponse **/
    protected $response;

    /**
     * {@inheritDoc}
     * @param \Easytransac\Entities\PaymentHistoryRequest
     * @see \EasyTransac\Requests\Request::execute()
     */
    public function execute(Entity $entity)
    {
        return $this->call('/payment/history', $entity);
    }
}
