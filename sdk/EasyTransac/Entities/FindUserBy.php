<?php

namespace EasyTransac\Entities;

/**
 * Represents the arguments for the "FindUser" request.
 * Allows searching for a user by email or by identifier.
 */
class FindUserBy extends Entity
{
    /** @map:Email **/
    protected $email = null;

    /** @map:Id **/
    protected $id = null;

    /**
     * Sets the email of the user to search for.
     *
     * @param string $email The user's email address.
     * @return $this Fluent interface.
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Sets the identifier of the user to search for.
     *
     * @param int|string $id The user's identifier.
     * @return $this Fluent interface.
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
}
