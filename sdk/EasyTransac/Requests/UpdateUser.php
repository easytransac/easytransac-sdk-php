<?php

namespace EasyTransac\Requests;

use \EasyTransac\Entities\Entity;

/**
 * API function /user/update, makes an update of an user
 * @author Klyde
 * @copyright EasyTransac
 */
class UpdateUser extends Request
{
    /** @object:UserInfos **/
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