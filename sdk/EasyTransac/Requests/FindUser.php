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
     * {@inheritDoc}
     * @see \EasyTransac\Requests\Request::execute()
     */
    public function execute(Entity $entity)
    {
    	$this->requiredFields = [
    		'Id',
    		'Email',
    		'Firstname',
    		'Lastname',
    	];
    	
        return $this->call('/user/find', $entity);
    }
}

?>