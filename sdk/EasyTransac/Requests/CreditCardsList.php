<?php

namespace EasyTransac\Requests;

use \EasyTransac\Entities\Entity;

class CreditCardsList extends Request
{
    /** @object:CreditCardsList **/
    protected $response;

    public function execute(Entity $entity)
    {
        return parent::call('/payment/listcards', $entity);
    }
}

?>