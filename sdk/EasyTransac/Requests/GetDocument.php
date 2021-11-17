<?php

namespace EasyTransac\Requests;

use EasyTransac\Entities\Entity;

/**
 * API function /kyc/get, get a document
 * URL: https://www.easytransac.com/fr/documentation#tag/API-Document/paths/~1api~1kyc~1get/post
 * @copyright EasyTransac
 */
class GetDocument extends Request
{
    /** @object:Document **/
    protected $response;

    /**
     * {@inheritDoc}
     * @see \EasyTransac\Requests\Request::execute()
     */
    public function execute(Entity $entity)
    {
        return $this->call('/kyc/get', $entity);
    }
}
