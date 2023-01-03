<?php

namespace EasyTransac\Entities;

/**
 * Représente les arguments pour la requête "PaymentHistoryRequest".
 * Cette entité permet de configurer les paramètres nécessaires à la consultation
 * de l'historique des paiements via l'API EasyTransac.
 *
 * @copyright EasyTransac
 */
class PaymentHistoryRequest extends Entity
{
    /** 
     * Numéro de la page des résultats à récupérer.
     * 
     * @var int|null
     * @map:Page 
     */
    protected $page = null;

    /** 
     * Date de début pour filtrer les paiements (format attendu : YYYY-MM-DD).
     * 
     * @var string|null
     * @map:DateFrom 
     */
    protected $dateFrom = null;

    /** 
     * Adresse email associée au paiement à filtrer.
     * 
     * @var string|null
     * @map:Email 
     */
    protected $email = null;

    /** 
     * Identifiant du paiement à rechercher.
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
     * Définit le nombre maximum de résultats à retourner.
     *
     * @param int $limit Nombre maximum de résultats.
     * @return $this Retourne l'instance courante pour chaînage.
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * Définit le numéro de page à récupérer.
     *
     * @param int $page Numéro de la page.
     * @return $this Retourne l'instance courante pour chaînage.
     */
    public function setPage($page)
    {
        $this->page = $page;
        return $this;
    }

    /**
     * Définit la date de début pour le filtrage des résultats.
     *
     * @param string $dateFrom Date de début au format YYYY-MM-DD.
     * @return $this Retourne l'instance courante pour chaînage.
     */
    public function setDateFrom($dateFrom)
    {
        $this->dateFrom = $dateFrom;
        return $this;
    }

    /**
     * Définit l'adresse email à filtrer.
     *
     * @param string $email Adresse email liée au paiement.
     * @return $this Retourne l'instance courante pour chaînage.
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Définit l'identifiant du paiement.
     *
     * @param string $id Identifiant du paiement.
     * @return $this Retourne l'instance courante pour chaînage.
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
}
