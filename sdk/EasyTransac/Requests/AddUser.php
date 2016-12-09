<?php

namespace EasyTransac\Requests;

use \EasyTransac\Entities\Entity;

/**
 * API function /user/add, add a new user
 * @author Klyde
 * @copyright EasyTransac
 */
class AddUser extends Request
{
    /** @object:UserInfos **/
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

?>