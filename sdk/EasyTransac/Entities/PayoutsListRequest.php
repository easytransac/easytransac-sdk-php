<?php

namespace EasyTransac\Entities;

/**
 * Represents the parameters for the "Payouts list" request.
 * This entity lets you filter results when retrieving the list of payouts
 * via the EasyTransac API.
 */
class PayoutsListRequest extends Entity
{
    /**
     * Results page number to retrieve.
     *
     * @var int|null
     * @map:Page
     */
    protected $page = null;

    /**
     * Start date to filter payouts (format: YYYY-MM-DD).
     *
     * @var string|null
     * @map:DateFrom
     */
    protected $dateFrom = null;

    /**
     * Whether to filter payouts in the live (production) environment.
     *
     * @var bool|null
     * @map:Live
     */
    protected $live = null;

    /**
     * Email address associated with the payouts to filter.
     *
     * @var string|null
     * @map:Email
     */
    protected $email = null;

    /**
     * Identifier of the payout to retrieve.
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
     * Sets the start date to filter payouts.
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
     * Sets the email address associated with the payout.
     *
     * @param string $email Beneficiary or sender email address.
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Sets the payout identifier.
     *
     * @param string $id Unique payout identifier.
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
}
