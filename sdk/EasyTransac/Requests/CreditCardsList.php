<?php

namespace EasyTransac\Requests;

use \EasyTransac\Entities\Entity;

/**
 * API function /payment/listcards, gets the credit cards list
 * @author Klyde
 * @copyright EasyTransac
 */
class CreditCardsList extends Request
{
    /** @object:CreditCardsList **/
    protected $response;

    /**
     * {@inheritDoc}
     * @see \EasyTransac\Requests\Request::execute()
     */
    public function execute(Entity $entity)
    {
        return parent::call('/payment/listcards', $entity);
    }
}

?>