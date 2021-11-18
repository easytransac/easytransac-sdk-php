<?php

namespace EasyTransac\Entities;

/**
 * Represents arguments of the request "Payment requests"
 * URL: https://www.easytransac.com/fr/documentation#tag/API-Payment/paths/~1api~1payment~1requests/post
 * @copyright EasyTransac
 */
class PaymentRequestsHistoryRequest extends Entity
{
    /** @map:Limit **/
    protected $limit = null;

    /** @map:Page **/
    protected $page = null;

    /** @map:Remote **/
    protected $remote = null;

    /** @map:DateFrom **/
    protected $dateFrom = null;

    /** @map:Live **/
    protected $live = null;

    /** @map:Email **/
    protected $email = null;

    /** @map:Id **/
    protected $id = null;

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

    public function setRemote($remote)
    {
        $this->remote = $remote;
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
