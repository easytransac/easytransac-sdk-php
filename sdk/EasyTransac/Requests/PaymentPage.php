<?php

namespace EasyTransac\Requests;

use \EasyTransac\Entities\Entity;

/**
 * API function /payment/page, asks for the external payment page
 * @author Klyde
 * @copyright EasyTransac
 */
class PaymentPage extends Request
{
    /** @object:PaymentPageInfos **/
    protected $response;

    /**
     * {@inheritDoc}
     * @see \EasyTransac\Requests\Request::execute()
     */
    public function execute(Entity $entity)
    {
    	$this->requiredFields = [
    		'RequestId',
    		'Status',
    		'Date',
    		'PageUrl',
    	];
    	
        return $this->call('/payment/page', $entity);
    }
}

?>