<?php

namespace EasyTransac\Entities;

/**
 * Represents arguments for request "Cancellation"
 * @copyright EasyTransac
 */
class Cancellation extends Entity
{
    /** @map:RequestId **/
    protected $requestId = null;
    /** @map:Language **/
    protected $language = null;

    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;
        return $this;
    }

    public function setLanguage($language)
    {
        $this->language = $language;
        return $this;
    }
}
