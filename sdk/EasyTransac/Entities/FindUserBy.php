<?php

namespace EasyTransac\Entities;

/**
 * Represents arguments of the request "FindUser"
 * @copyright EasyTransac
 */
class FindUserBy extends Entity
{
    /** @map:Email  **/
    protected $email  = null;

    /** @map:Id   **/
    protected $id   = null;

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
