<?php

namespace EasyTransac\Responses;

use \EasyTransac\Entities\Entity;

class StandardResponse
{
    protected $entity;
    protected $errorMessage;
    protected $errorCode;
    protected $success = false;

    public function isSuccess()
    {
        return $this->success;
    }

    public function setSuccess($success)
    {
        $this->success = $success;
        return $this;
    }

    public function getErrorCode()
    {
        return $this->errorCode;
    }

    public function setErrorCode($code)
    {
        $this->errorCode = $code;
        return $this;
    }

    public function getContent()
    {
        return $this->entity;
    }

    public function setContent(Entity $entity)
    {
        $this->entity = $entity;
        return $this;
    }

    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    public function setErrorMessage($message)
    {
        $this->errorMessage = $message;
        return $this;
    }
}

?>