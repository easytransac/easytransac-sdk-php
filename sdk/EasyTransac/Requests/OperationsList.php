<?php

namespace EasyTransac\Requests;

use EasyTransac\Entities\Entity;

/**
 * API function /payment/operations, request user's operations
 * URL: https://www.easytransac.com/fr/documentation#tag/API-User/paths/~1api~1user~1operations/post
 * @copyright EasyTransac
 */
class OperationsList extends Request
{
    /** @object:PaymentPageInfos **/
    protected $response;

    /**
     * {@inheritDoc}
     * @see \EasyTransac\Requests\Request::execute()
     */
    public function execute(Entity $entity)
    {
        return $this->call('/user/operations', $entity);
    }
}
