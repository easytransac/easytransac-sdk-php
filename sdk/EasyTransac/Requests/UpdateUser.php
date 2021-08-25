<?php

namespace EasyTransac\Requests;

use \EasyTransac\Entities\Entity;

/**
 * API function /user/update, makes an update of an user
 * @copyright EasyTransac
 */
class UpdateUser extends Request
{
    /** @object:User **/
    protected $response;

    /**
     * {@inheritDoc}
     * @see \EasyTransac\Requests\Request::execute()
     */
    public function execute(Entity $entity)
    {
        return $this->call('/user/update', $entity);
    }
}

?>