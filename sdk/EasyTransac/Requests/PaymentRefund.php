<?php

namespace EasyTransac\Requests;

use \EasyTransac\Entities\Entity;

/**
 * API function /payment/refund, asks for a refund
 * @author Klyde
 * @copyright EasyTransac
 */
class PaymentRefund extends Request
{
    /** @object:PaymentPageInfos **/
    protected $response;

    /**
     * {@inheritDoc}
     * @see \EasyTransac\Requests\Request::execute()
     */
    public function execute(Entity $entity)
    {
        return parent::call('/payment/refund', $entity);
    }
}

?>