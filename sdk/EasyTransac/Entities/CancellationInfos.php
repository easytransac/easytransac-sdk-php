<?php

namespace EasyTransac\Entities;

/**
 * Représente la réponse de la requête "cancellation" (annulation de transaction).
 *
 * Cette entité contient les informations renvoyées après une demande
 * d'annulation d'une transaction via l'API EasyTransac.
 *
 * @package EasyTransac\Entities
 * @copyright EasyTransac
 */
class CancellationInfos extends Entity
{
    /**
     * Identifiant (TID) de la transaction d'annulation.
     *
     * @var string|null
     * @map:Tid
     */
    protected $tid = null;

    /**
     * Identifiant (TID) de la transaction initiale avant annulation.
     *
     * @var string|null
     * @map:OriginalPaymentTid
     */
    protected $originalPaymentTid = null;

    /**
     * Date de l'opération d'annulation.
     *
     * Format attendu : YYYY-MM-DD HH:MM:SS
     *
     * @var string|null
     * @map:Date
     */
    protected $date = null;

    /**
     * Message associé à la réponse de l'annulation (peut contenir un statut ou une explication).
     *
     * @var string|null
     * @map:Message
     */
    protected $message = null;

    /**
     * Retourne l'identifiant de la transaction d'annulation.
     *
     * @return string|null
     */
    public function getTid()
    {
        return $this->tid;
    }

    /**
     * Retourne l'identifiant de la transaction initiale annulée.
     *
     * @return string|null
     */
    public function getOriginalPaymentTid()
    {
        return $this->originalPaymentTid;
    }

    /**
     * Retourne la date de l'annulation.
     *
     * @return string|null Date au format YYYY-MM-DD HH:MM:SS
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Retourne le message d'information associé à la réponse.
     *
     * @return string|null
     */
    public function getMessage()
    {
        return $this->message;
    }
}
