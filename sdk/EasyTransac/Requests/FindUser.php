<?php

namespace EasyTransac\Requests;

use \EasyTransac\Entities\Entity;

class FindUser extends Request
{
    /** @object:User **/
    protected $response;

    public function execute(Entity $entity)
    {
        return parent::call('/user/find', $entity);
    }
}

?>