<?php

namespace EasyTransac\Entities;

/**
 * Représente les arguments de la requête "FindUser".
 * Permet de rechercher un utilisateur par email ou par identifiant.
 *
 * @copyright EasyTransac
 */
class FindUserBy extends Entity
{
    /** @map:Email  **/
    protected $email  = null;

    /** @map:Id   **/
    protected $id   = null;

    /**
     * Définit l'email de l'utilisateur à rechercher.
     *
     * @param string $email L'adresse email de l'utilisateur.
     * @return $this Retourne l'instance courante pour chaînage.
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Définit l'identifiant de l'utilisateur à rechercher.
     *
     * @param int|string $id L'identifiant de l'utilisateur.
     * @return $this Retourne l'instance courante pour chaînage.
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
}
