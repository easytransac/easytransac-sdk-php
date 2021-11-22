<?php

namespace EasyTransac\Requests;

use EasyTransac\Entities\Entity;

/**
 * API function /payment/direct, makes a payment "direct"
 * URL: https://www.easytransac.com/fr/documentation#tag/API-Payment/paths/~1api~1payment~1direct/post
 * @copyright EasyTransac
 */
class DirectPayment extends Request
{
    /** @object:DoneTransaction **/
    protected $response;

   /**
    * {@inheritDoc}
    * @see \EasyTransac\Requests\Request::execute()
    */
    public function execute(Entity $entity)
    {
        return $this->call('/payment/direct', $entity);
    }
}
