<?php

namespace EasyTransac\Requests;

use EasyTransac\Entities\Entity;

/**
 * API function /user/add, used to add a new user
 * URL: https://www.easytransac.com/fr/documentation#tag/API-User/paths/~1api~1user~1add/post
 * @copyright EasyTransac
 */
class AddUser extends Request
{
    /** @object:User **/
    protected $response;

    /**
     * {@inheritDoc}
     * @see \EasyTransac\Requests\Request::execute()
     */
    public function execute(Entity $entity)
    {
        return $this->call('/user/add', $entity);
    }
}
