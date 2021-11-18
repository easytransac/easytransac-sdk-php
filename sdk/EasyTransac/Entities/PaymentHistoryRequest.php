<?php

namespace EasyTransac\Entities;

/**
 * Represents arguments of the request "PaymentHistoryRequest"
 * @copyright EasyTransac
 */
class PaymentHistoryRequest extends Entity
{
    /** @map:Page **/
    protected $page = null;

    /** @map:DateFrom **/
    protected $dateFrom = null;

    /** @map:Live **/
    protected $live = null;

    /** @map:Email **/
    protected $email = null;

    /** @map:Id **/
    protected $id = null;

    /** @map:Limit **/
    protected $limit = null;

    public function setLimit($limit)
    {
        $this->limit = $limit;
        return $this;
    }

    public function setPage($page)
    {
        $this->page = $page;
        return $this;
    }

    public function setDateFrom($dateFrom)
    {
        $this->dateFrom = $dateFrom;
        return $this;
    }

    public function setLive($live)
    {
        $this->live = $live;
        return $this;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
}
