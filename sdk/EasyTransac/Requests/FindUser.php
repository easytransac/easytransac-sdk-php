<?php

namespace EasyTransac\Requests;

use \EasyTransac\Entities\Entity;

/**
 * API function /user/find, search a user
 * @author Klyde
 * @copyright EasyTransac
 */
class FindUser extends Request
{
    /** @object:User **/
    protected $response;

    /**
     * Calls the API function
     * @param Entity $entity
     * @return \EasyTransac\Responses\StandardResponse
     */
    public function execute(Entity $entity)
    {
        return parent::call('/user/find', $entity);
    }
}

?>