<?php

namespace EasyTransac\Requests;

use \EasyTransac\Entities\Entity;

class Cancellation extends Request
{
    /** @object:CancellationInfos **/
    protected $response;

    public function execute(Entity $entity)
    {
        return parent::call('/payment/cancel', $entity);
    }
}

?>