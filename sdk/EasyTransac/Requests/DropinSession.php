<?php

namespace EasyTransac\Requests;

use EasyTransac\Entities\DropinSession as DropinSessionEntity;
use EasyTransac\Entities\Entity;

/**
 * API function /dropin/session, creates a Drop-in session token.
 *
 * @copyright EasyTransac
 */
class DropinSession extends Request
{
    /** @object:DropinSession **/
    protected $response;

    public function execute(Entity $entity)
    {
        $response = $this->call('/dropin/session', $entity);

        if (!$response->isSuccess()) {
            return $response;
        }

        $session = $response->getContent();
        if (!$session instanceof DropinSessionEntity || !$session->hasToken()) {
            return $response
                ->setSuccess(false)
                ->setErrorMessage('Missing session token in Drop-in response');
        }

        return $response;
    }
}
