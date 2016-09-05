<?php

namespace EasyTransac\Requests;

use \EasyTransac\Entities\Entity;

class DirectPayment extends Request
{
    /** @object:DoneTransaction **/
    protected $response;

    public function execute(Entity $entity)
    {
        return parent::call('/payment/direct', $entity);
    }
}

?>