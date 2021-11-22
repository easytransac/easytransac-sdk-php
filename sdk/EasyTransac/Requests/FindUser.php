<?php

namespace EasyTransac\Requests;

use EasyTransac\Entities\Entity;

/**
 * API function /user/find, search a user
 * URL: https://www.easytransac.com/fr/documentation#tag/API-User/paths/~1api~1user~1find/post
 * @copyright EasyTransac
 */
class FindUser extends Request
{
    /** @object:User **/
    protected $response;

    /**
     * {@inheritDoc}
     * @see \EasyTransac\Requests\Request::execute()
     */
    public function execute(Entity $entity)
    {
        return $this->call('/user/find', $entity);
    }
}
