<?php

namespace EasyTransac\Entities;

/**
 * Représente les paramètres d'une requête "OperationsListRequest".
 *
 * Cette entité permet de filtrer la liste des opérations selon différents critères
 * comme la date, l'adresse e-mail, l'identifiant de la transaction, etc.
 *
 * @package EasyTransac\Entities
 * @copyright EasyTransac
 */
class OperationsListRequest extends Entity
{
    /**
     * Numéro de page pour la pagination des résultats.
     *
     * @var int|null
     * @map:Page
     */
    protected $page = null;

    /**
     * Date de début pour filtrer les opérations (au format YYYY-MM-DD).
     *
     * @var string|null
     * @map:DateFrom
     */
    protected $dateFrom = null;

    /**
     * Adresse e-mail utilisée pour filtrer les opérations.
     *
     * @var string|null
     * @map:Email
     */
    protected $email = null;

    /**
     * Identifiant spécifique de l'opération à récupérer.
     *
     * @var string|null
     * @map:Id
     */
    protected $id = null;

    /**
     * Nombre maximal de résultats à retourner.
     *
     * @var int|null
     * @map:Limit
     */
    protected $limit = null;

    /**
     * Définit la limite maximale de résultats à retourner.
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
     * Définit la page de pagination souhaitée.
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
     * Définit la date de début pour filtrer les opérations.
     *
     * @param string $dateFrom Date au format YYYY-MM-DD
     * @return $this
     */
    public function setDateFrom($dateFrom)
    {
        $this->dateFrom = $dateFrom;
        return $this;
    }

    /**
     * Définit l'adresse e-mail associée à la recherche.
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
     * Définit l'identifiant de l'opération recherchée.
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