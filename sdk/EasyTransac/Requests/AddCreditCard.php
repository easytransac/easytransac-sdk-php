<?php

namespace EasyTransac\Requests;

use \EasyTransac\Entities\Entity;

class AddCreditCard extends Request
{
    /** @object:CreditCardsList **/
    protected $response;

    public function execute(Entity $entity)
    {
        return parent::call('/payment/addcard', $entity);
    }
}

?>