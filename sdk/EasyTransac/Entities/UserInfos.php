<?php

namespace EasyTransac\Entities;

/**
 * Represents the response of the request "AddUser" and "UpdateUser"
 * @author klyde
 * @copyright EasyTransac
 */
class UserInfos extends Entity
{
    /** @map:Id **/
    protected $id = null;
    /** @map:Message **/
    protected $message = null;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }
}

?>