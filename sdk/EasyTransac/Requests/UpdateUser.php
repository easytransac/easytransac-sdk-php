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
     * Calls the API function
     * @param Entity $entity
     * @return \EasyTransac\Responses\StandardResponse
     */
    public function execute(Entity $entity)
    {
        return parent::call('/user/update', $entity);
    }
}

?>