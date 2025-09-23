<?php

namespace EasyTransac\Entities;

/**
 * Represents the parameters for the "Payment requests" endpoint.
 * This entity lets you filter results when retrieving the history of payment requests
 * via the EasyTransac API.
 *
 * Docs: https://www.easytransac.com/fr/documentation#tag/API-Payment/paths/~1api~1payment~1requests/post
 */
class PaymentRequestsHistoryRequest extends Entity
{
    /**
     * Maximum number of results to return.
     *
     * @var int|null
     * @map:Limit
     */
    protected $limit = null;

    /**
     * Results page number to retrieve.
     *
     * @var int|null
     * @map:Page
     */
    protected $page = null;

    /**
     * Indicates whether the request was performed remotely (e.g., via API).
     *
     * @var bool|null
     * @map:Remote
     */
    protected $remote = null;

    /**
     * Start date from which requests should be listed (format: YYYY-MM-DD).
     *
     * @var string|null
     * @map:DateFrom
     */
    protected $dateFrom = null;

    /**
     * Email address associated with the payment requests to filter.
     *
     * @var string|null
     * @map:Email
     */
    protected $email = null;

    /**
     * Identifier of a specific payment request to retrieve.
     *
     * @var string|null
     * @map:Id
     */
    protected $id = null;

    /**
     * Sets the maximum number of results to return.
     *
     * @param int $limit
     * @return $this
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * Sets the results page number to retrieve.
     *
     * @param int $page
     * @return $this
     */
    public function setPage($page)
    {
        $this->page = $page;
        return $this;
    }

    /**
     * Sets whether the request is remote.
     *
     * @param bool $remote Indicates if the request comes from a remote call.
     * @return $this
     */
    public function setRemote($remote)
    {
        $this->remote = $remote;
        return $this;
    }

    /**
     * Sets the start date filter.
     *
     * @param string $dateFrom Date in YYYY-MM-DD format.
     * @return $this
     */
    public function setDateFrom($dateFrom)
    {
        $this->dateFrom = $dateFrom;
        return $this;
    }

    /**
     * Sets the email address to filter by.
     *
     * @param string $email Recipient email address.
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Sets the specific payment request identifier to retrieve.
     *
     * @param string $id Request identifier.
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
}
