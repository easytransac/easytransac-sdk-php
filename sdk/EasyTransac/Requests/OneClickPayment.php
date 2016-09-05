<?php

namespace EasyTransac\Requests;

use \EasyTransac\Entities\Entity;

class OneClickPayment extends Request
{
    /** @object:DoneTransaction **/
    protected $response;

    public function execute(Entity $entity)
    {
        return parent::call('/payment/oneclick', $entity);
    }
}

?>