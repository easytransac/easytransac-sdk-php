<?php

namespace EasyTransac\Requests;

use EasyTransac\Entities\Entity;

/**
 * API function /kyc/find, Find documents
 * URL: https://www.easytransac.com/fr/documentation#tag/API-Document/paths/~1api~1kyc~1find/post
 * @copyright EasyTransac
 */
class FindDocument extends Request
{
    /** @object:Document **/
    protected $response;

    /**
     * {@inheritDoc}
     * @see \EasyTransac\Requests\Request::execute()
     */
    public function execute(Entity $entity)
    {
        return $this->call('/kyc/find', $entity);
    }
}
