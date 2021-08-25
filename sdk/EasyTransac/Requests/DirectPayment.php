<?php

namespace EasyTransac\Requests;

use \EasyTransac\Entities\Entity;

/**
 * API function /payment/direct, makes a payment "direct"
 * @copyright EasyTransac
 */
class DirectPayment extends Request
{
    /** @object:DoneTransaction **/
    protected $response;

   /**
    * {@inheritDoc}
    * @see \EasyTransac\Requests\Request::execute()
    */
    public function execute(Entity $entity)
    {
        return $this->call('/payment/direct', $entity);
    }
}

?>