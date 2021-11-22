<?php

namespace EasyTransac\Requests;

use EasyTransac\Entities\Entity;

/**
 * API function /payment/cancelpage, asks for the cancellation of a payment page
 * URL: https://www.easytransac.com/fr/documentation#tag/API-Payment/paths/~1api~1payment~1cancelpage/post
 * @copyright EasyTransac
 */
class PaymentPageCancellation extends Request
{
    /** @object:PaymentPageCancellationInfos **/
    protected $response;

    /**
     * {@inheritDoc}
     * @see \EasyTransac\Requests\Request::execute()
     */
    public function execute(Entity $entity)
    {
        return $this->call('/payment/cancelpage', $entity);
    }
}
