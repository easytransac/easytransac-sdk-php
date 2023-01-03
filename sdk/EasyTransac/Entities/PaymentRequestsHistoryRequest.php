<?php

namespace EasyTransac\Entities;

/**
 * Représente les paramètres de la requête "Payment requests".
 * Cette entité permet de filtrer les résultats lors de la récupération de l'historique des demandes de paiement
 * via l’API EasyTransac.
 *
 * Documentation : https://www.easytransac.com/fr/documentation#tag/API-Payment/paths/~1api~1payment~1requests/post
 * 
 * @copyright EasyTransac
 */
class PaymentRequestsHistoryRequest extends Entity
{
    /**
     * Nombre maximum de résultats à retourner.
     *
     * @var int|null
     * @map:Limit
     */
    protected $limit = null;

    /**
     * Numéro de page des résultats à récupérer.
     *
     * @var int|null
     * @map:Page
     */
    protected $page = null;

    /**
     * Indique si la requête a été effectuée à distance (via API par exemple).
     *
     * @var bool|null
     * @map:Remote
     */
    protected $remote = null;

    /**
     * Date de début à partir de laquelle les demandes doivent être listées (format : YYYY-MM-DD).
     *
     * @var string|null
     * @map:DateFrom
     */
    protected $dateFrom = null;

    /**
     * Adresse email associée aux demandes de paiement à filtrer.
     *
     * @var string|null
     * @map:Email
     */
    protected $email = null;

    /**
     * Identifiant d'une demande de paiement spécifique à récupérer.
     *
     * @var string|null
     * @map:Id
     */
    protected $id = null;

    /**
     * Définit la limite du nombre de résultats.
     *
     * @param int $limit Nombre maximum de résultats à retourner.
     * @return $this Retourne l’instance courante pour chaînage.
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * Définit le numéro de page de résultats à récupérer.
     *
     * @param int $page Numéro de page.
     * @return $this Retourne l’instance courante pour chaînage.
     */
    public function setPage($page)
    {
        $this->page = $page;
        return $this;
    }

    /**
     * Définit si la demande est distante (remote).
     *
     * @param bool $remote Indique si la demande provient d'un appel distant.
     * @return $this Retourne l’instance courante pour chaînage.
     */
    public function setRemote($remote)
    {
        $this->remote = $remote;
        return $this;
    }

    /**
     * Définit la date de début du filtre.
     *
     * @param string $dateFrom Date au format YYYY-MM-DD.
     * @return $this Retourne l’instance courante pour chaînage.
     */
    public function setDateFrom($dateFrom)
    {
        $this->dateFrom = $dateFrom;
        return $this;
    }

    /**
     * Définit l'adresse email à filtrer.
     *
     * @param string $email Adresse email du destinataire.
     * @return $this Retourne l’instance courante pour chaînage.
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Définit l’identifiant spécifique d’une demande à récupérer.
     *
     * @param string $id Identifiant de la demande.
     * @return $this Retourne l’instance courante pour chaînage.
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
}
