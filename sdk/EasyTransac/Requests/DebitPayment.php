<?php

namespace EasyTransac\Requests;

use EasyTransac\Entities\Entity;

/**
 * API function /payment/debit, makes a payment by "debit"
 * URL: https://www.easytransac.com/fr/documentation#tag/API-Payment/paths/~1api~1payment~1debit/post
 * @copyright EasyTransac
 */
class DebitPayment extends Request
{
    /** @object:DoneTransaction **/
    protected $response;

    /**
     * {@inheritDoc}
     * @see \EasyTransac\Requests\Request::execute()
     */
    public function execute(Entity $entity)
    {
        // Pre-validate mandatory fields before calling the API
        $params = $entity->toArray();
        if (!array_key_exists('Phone', $params) || empty($params['Phone'])) {
            $sr = new \EasyTransac\Responses\StandardResponse();
            return $sr->setErrorMessage('Missing required field: Phone (customer phone number)');
        }
        return $this->call('/payment/debit', $entity);
    }
}
