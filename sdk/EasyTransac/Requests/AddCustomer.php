<?php

namespace EasyTransac\Requests;

use \EasyTransac\Entities\Entity;

/**
 * API function /client/add, add a new customer
 * @copyright EasyTransac
 */
class AddCustomer extends Request
{
    /** @object:Customer **/
    protected $response;

    /**
     * {@inheritDoc}
     * @see \EasyTransac\Requests\Request::execute()
     */
    public function execute(Entity $entity)
    {
        return $this->call('/client/add', $entity);
    }
}

?>