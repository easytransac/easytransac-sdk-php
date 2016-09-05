<?php

namespace EasyTransac\Requests;

use \EasyTransac\Entities\Entity;

class PaymentPage extends Request
{
    /** @object:PaymentPageInfos **/
    protected $response;

    public function execute(Entity $entity)
    {
        return parent::call('/payment/page', $entity);
    }
}

?>