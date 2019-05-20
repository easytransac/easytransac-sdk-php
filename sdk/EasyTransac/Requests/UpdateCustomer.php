<?php

namespace EasyTransac\Requests;

use \EasyTransac\Entities\Entity;

/**
 * API function /client/update, edit a customer
 * @author Klyde
 * @copyright EasyTransac
 */
class UpdateCustomer extends Request
{
    /** @object:CustomerInfos **/
    protected $response;

    /**
     * {@inheritDoc}
     * @see \EasyTransac\Requests\Request::execute()
     */
    public function execute(Entity $entity)
    {
        return $this->call('/client/update', $entity);
    }
}

?>