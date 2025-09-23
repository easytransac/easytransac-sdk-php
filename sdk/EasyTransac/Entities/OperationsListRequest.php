<?php

namespace EasyTransac\Entities;

/**
 * Represents the parameters for an "OperationsListRequest".
 *
 * This entity allows filtering the list of operations by various criteria
 * such as date, email address, transaction identifier, etc.
 *
 * @package EasyTransac\Entities
 *
 */
class OperationsListRequest extends Entity
{
    /**
     * Page number for paginating results.
     *
     * @var int|null
     * @map:Page
     */
    protected $page = null;

    /**
     * Start date to filter operations (format YYYY-MM-DD).
     *
     * @var string|null
     * @map:DateFrom
     */
    protected $dateFrom = null;

    /**
     * Email address used to filter operations.
     *
     * @var string|null
     * @map:Email
     */
    protected $email = null;

    /**
     * Specific operation identifier to retrieve.
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
     * Sets the desired pagination page.
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
     * Sets the start date to filter operations.
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
     * Sets the email address associated with the search.
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
     * Sets the identifier of the operation to retrieve.
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
