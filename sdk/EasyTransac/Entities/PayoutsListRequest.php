<?php

namespace EasyTransac\Entities;

/**
 * Représente les paramètres de la requête "Payouts list".
 * Cette entité permet de filtrer les résultats lors de la récupération de la liste des virements (payouts)
 * via l’API EasyTransac.
 *
 * @copyright EasyTransac
 */
class PayoutsListRequest extends Entity
{
    /**
     * Numéro de la page de résultats à récupérer.
     *
     * @var int|null
     * @map:Page
     */
    protected $page = null;

    /**
     * Date de début pour filtrer les virements (format : YYYY-MM-DD).
     *
     * @var string|null
     * @map:DateFrom
     */
    protected $dateFrom = null;

    /**
     * Indique si l'on souhaite filtrer les virements en environnement live (production).
     *
     * @var bool|null
     * @map:Live
     */
    protected $live = null;

    /**
     * Adresse email associée aux virements à filtrer.
     *
     * @var string|null
     * @map:Email
     */
    protected $email = null;

    /**
     * Identifiant du virement à rechercher.
     *
     * @var string|null
     * @map:Id
     */
    protected $id = null;

    /**
     * Nombre maximum de résultats à retourner.
     *
     * @var int|null
     * @map:Limit
     */
    protected $limit = null;

    /**
     * Définit la limite de résultats à retourner.
     *
     * @param int $limit Nombre maximum de résultats.
     * @return $this Retourne l’instance courante pour chaînage.
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * Définit le numéro de page à récupérer.
     *
     * @param int $page Numéro de la page de résultats.
     * @return $this Retourne l’instance courante pour chaînage.
     */
    public function setPage($page)
    {
        $this->page = $page;
        return $this;
    }

    /**
     * Définit la date de début pour filtrer les virements.
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
     * Définit l'adresse email associée au virement.
     *
     * @param string $email Adresse email du bénéficiaire ou de l’expéditeur.
     * @return $this Retourne l’instance courante pour chaînage.
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Définit l’identifiant du virement.
     *
     * @param string $id Identifiant unique du payout.
     * @return $this Retourne l’instance courante pour chaînage.
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
}
