<?php

namespace EasyTransac\Requests;

use \EasyTransac\Entities\Entity;

/**
 * API function /payment/capture, 
 * @author Klyde
 * @copyright EasyTransac
 */
class Capture extends Request
{
    /** @object:PaymentCapture **/
    protected $response;

    /**
     * {@inheritDoc}
     * @see \EasyTransac\Requests\Request::execute()
     */
    public function execute(Entity $entity)
    {
        return $this->call('/payment/capture', $entity);
    }
}

?>