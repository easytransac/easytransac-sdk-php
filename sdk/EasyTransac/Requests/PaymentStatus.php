<?php

namespace EasyTransac\Requests;

use \EasyTransac\Entities\Entity;

class PaymentStatus extends Request
{
    /** @object:DoneTransaction **/
    protected $response;

    public function execute(Entity $entity)
    {
        return parent::call('/payment/status', $entity);
    }
}

?>