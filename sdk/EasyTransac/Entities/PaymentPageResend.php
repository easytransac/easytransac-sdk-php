<?php

namespace EasyTransac\Entities;

/**
 * Represents the parameters for the "PaymentPageResend" request.
 * This entity allows resending an existing payment page link via the EasyTransac API.
 */
class PaymentPageResend extends Entity
{
    /**
     * Unique identifier of the payment request to resend.
     *
     * @var string|null
     * @map:RequestId
     */
    protected $requestId = null;

    /**
     * Language to use for the resent link (e.g., 'fr', 'en').
     *
     * @var string|null
     * @map:Language
     */
    protected $language = null;

    /**
     * Sets the identifier of the payment request to resend.
     *
     * @param string $requestId Unique identifier generated during initial creation.
     * @return $this Fluent interface.
     */
    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;
        return $this;
    }

    /**
     * Sets the language to use for the resent link.
     *
     * @param string $language Language code (e.g., 'fr', 'en').
     * @return $this Fluent interface.
     */
    public function setLanguage($language)
    {
        $this->language = $language;
        return $this;
    }
}
