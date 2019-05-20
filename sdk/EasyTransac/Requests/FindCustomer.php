<?php

namespace EasyTransac\Requests;

use \EasyTransac\Entities\Entity;

/**
 * API function /client/find, find a customer
 * @author Klyde
 * @copyright EasyTransac
 */
class FindCustomer extends Request
{
    /** @object:CustomerInfos **/
    protected $response;

    /**
     * {@inheritDoc}
     * @see \EasyTransac\Requests\Request::execute()
     */
    public function execute(Entity $entity)
    {
        return $this->call('/client/find', $entity);
    }
}

?>