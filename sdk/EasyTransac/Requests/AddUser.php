<?php

namespace EasyTransac\Requests;

use \EasyTransac\Entities\Entity;

class AddUser extends Request
{
    /** @object:UserInfos **/
    protected $response;

    public function execute(Entity $entity)
    {
        return parent::call('/user/add', $entity);
    }
}

?>