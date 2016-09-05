<?php

namespace EasyTransac\Requests;

use \EasyTransac\Entities\Entity;

class UpdateUser extends Request
{
    /** @object:UserInfos **/
    protected $response;

    public function execute(Entity $entity)
    {
        return parent::call('/user/update', $entity);
    }
}

?>