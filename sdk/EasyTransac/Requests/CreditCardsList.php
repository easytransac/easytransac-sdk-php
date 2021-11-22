<?php

namespace EasyTransac\Requests;

use EasyTransac\Entities\Entity;

/**
 * API function /payment/listcards, gets the credit cards list
 * URL: https://www.easytransac.com/fr/documentation#tag/API-Payment/paths/~1api~1payment~1listcards/post
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
        return $this->call('/payment/listcards', $entity);
    }
}
