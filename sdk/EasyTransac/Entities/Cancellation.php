<?php

namespace EasyTransac\Entities;

/**
 * Represents the parameters of a "Cancellation" request.
 *
 * This entity encapsulates the data required to cancel a transaction
 * through the EasyTransac API.
 *
 * @package EasyTransac\Entities
 * @copyright EasyTransac
 */
class Cancellation extends Entity
{
    /**
     * Unique identifier of the request to cancel.
     *
     * Mapped as "RequestId" in the API request.
     *
     * @var string|null
     * @map:RequestId
     */
    protected $requestId = null;

    /**
     * Preferred language code for the request (e.g., 'fr', 'en').
     *
     * Mapped as "Language" in the API request.
     *
     * @var string|null
     * @map:Language
     */
    protected $language = null;

    /**
     * Sets the unique identifier of the request to cancel.
     *
     * @param string $requestId The ID of the request to cancel.
     * @return $this
     */
    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;
        return $this;
    }

    /**
     * Sets the language used for the cancellation request.
     *
     * @param string $language ISO 639-1 language code (e.g., 'fr', 'en').
     * @return $this
     */
    public function setLanguage($language)
    {
        $this->language = $language;
        return $this;
    }
}
