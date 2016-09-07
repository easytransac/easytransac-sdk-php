<?php

namespace EasyTransac\Responses;

use \EasyTransac\Entities\Entity;

/**
 * Response used in return of a request
 * @author Klyde
 * @copyright EasyTransac
 */
class StandardResponse
{
    protected $entity;
    protected $errorMessage;
    protected $errorCode;
    protected $success = false;

    /**
     * Returns if the response is OK
     * @return boolean
     */
    public function isSuccess()
    {
        return $this->success;
    }

    /**
     * Defines if the response is OK
     * @param Boolean $success
     * @return \EasyTransac\Responses\StandardResponse
     */
    public function setSuccess($success)
    {
        $this->success = $success;
        return $this;
    }

    /**
     * Get the error code returned by the EasyTransac API 
     * @return String
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * Defines the error code
     * @param String $code
     * @return \EasyTransac\Responses\StandardResponse
     */
    public function setErrorCode($code)
    {
        $this->errorCode = $code;
        return $this;
    }

    /**
     * Returns the entity of the response (example: an entity "Customer")
     * @return \EasyTransac\Entities\Entity
     */
    public function getContent()
    {
        return $this->entity;
    }

    /**
     * Defines the entity
     * @param Entity $entity
     * @return \EasyTransac\Responses\StandardResponse
     */
    public function setContent(Entity $entity)
    {
        $this->entity = $entity;
        return $this;
    }

    /**
     * Get the error message in case of error of call or missing argument
     * @return String
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * Defines the error message
     * @param String $message
     * @return \EasyTransac\Responses\StandardResponse
     */
    public function setErrorMessage($message)
    {
        $this->errorMessage = $message;
        return $this;
    }
}

?>