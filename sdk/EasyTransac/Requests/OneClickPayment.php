<?php

namespace EasyTransac\Requests;

use EasyTransac\Entities\Entity;

/**
 * API function /payment/oneclick, asks for a payment OneClick
 * URL: https://www.easytransac.com/fr/documentation#tag/API-Payment/paths/~1api~1payment~1oneclick/post
 * @copyright EasyTransac
 */
class OneClickPayment extends Request
{
    /** @object:DoneTransaction **/
    protected $response;

    /**
     * {@inheritDoc}
     * @see \EasyTransac\Requests\Request::execute()
     */
    public function execute(Entity $entity)
    {
        return $this->call('/payment/oneclick', $entity);
    }
}
