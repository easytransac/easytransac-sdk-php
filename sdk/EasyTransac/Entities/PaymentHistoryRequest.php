<?php

namespace EasyTransac\Entities;

/**
 * Represents the arguments for a "PaymentHistoryRequest".
 * This entity configures the parameters needed to fetch the payment
 * history through the EasyTransac API.
 */
class PaymentHistoryRequest extends Entity
{
    /**
     * Results page number to retrieve.
     *
     * @var int|null
     * @map:Page
     */
    protected $page = null;

    /**
     * Start date to filter payments (expected format: YYYY-MM-DD).
     *
     * @var string|null
     * @map:DateFrom
     */
    protected $dateFrom = null;

    /**
     * Email address associated with the payments to filter.
     *
     * @var string|null
     * @map:Email
     */
    protected $email = null;

    /**
     * Identifier of the specific payment to fetch.
     *
     * @var string|null
     * @map:Id
     */
    protected $id = null;

    /**
     * Maximum number of results to return.
     *
     * @var int|null
     * @map:Limit
     */
    protected $limit = null;

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
     * Sets the start date for filtering results.
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
     * @param string $email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Sets the payment identifier.
     *
     * @param string $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
}
