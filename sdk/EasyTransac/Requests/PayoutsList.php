<?php

namespace EasyTransac\Requests;

use EasyTransac\Entities\Entity;

/**
 * API function /user/payouts
 * URL: https://www.easytransac.com/fr/documentation#tag/API-User/paths/~1api~1user~1payouts/post
 * @copyright EasyTransac
 */
class PayoutsList extends Request
{
    /** @object:PayoutsListResponse **/
    protected $response;

    /**
     * {@inheritDoc}
     * @param \Easytransac\Entities\PayoutsListRequest
     * @see \EasyTransac\Requests\Request::execute()
     */
    public function execute(Entity $entity)
    {
        return $this->call('/user/payouts', $entity);
    }
}
