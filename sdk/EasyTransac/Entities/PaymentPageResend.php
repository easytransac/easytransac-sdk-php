<?php

namespace EasyTransac\Entities;

/**
 * Represents arguments of the request "PaymentPageResend"
 * @copyright EasyTransac
 */
class PaymentPageResend extends Entity
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
