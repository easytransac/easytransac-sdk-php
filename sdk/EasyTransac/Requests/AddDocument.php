<?php

namespace EasyTransac\Requests;

use EasyTransac\Entities\Entity;

/**
 * API function /kyc/add, used to add a new document
 * URL: https://www.easytransac.com/fr/documentation#tag/API-Document/paths/~1api~1kyc~1add/post
 * @copyright EasyTransac
 */
class AddDocument extends Request
{
    /** @object:Document **/
    protected $response;

    /**
     * {@inheritDoc}
     * @see \EasyTransac\Requests\Request::execute()
     */
    public function execute(Entity $entity)
    {
        return $this->call('/kyc/add', $entity);
    }
}
