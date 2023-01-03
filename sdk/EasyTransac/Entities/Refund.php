<?php

namespace EasyTransac\Entities;

/**
 * Représente les arguments de la requête "PaymentRefund".
 * Cette entité permet de configurer les paramètres nécessaires pour initier un remboursement via l'API EasyTransac.
 *
 * @copyright EasyTransac
 */
class Refund extends Entity
{
    /**
     * Identifiant de la transaction à rembourser.
     *
     * @var string|null
     * @map:Tid
     */
    protected $tid = null;

    /**
     * Langue à utiliser pour la réponse (ex. : fr, en).
     *
     * @var string|null
     * @map:Language
     */
    protected $language = null;

    /**
     * Montant à rembourser (en centimes).
     * Si non spécifié, le montant total sera remboursé.
     *
     * @var int|null
     * @map:Amount
     */
    protected $amount = null;

    /**
     * Raison du remboursement (facultatif).
     *
     * @var string|null
     * @map:Reason
     */
    protected $reason = null;

    /**
     * Définit le montant du remboursement.
     *
     * @param int $amount Montant à rembourser en centimes.
     * @return $this Retourne l’instance courante pour chaînage.
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * Définit la raison du remboursement.
     *
     * @param string $reason Raison du remboursement (ex. : produit défectueux).
     * @return $this Retourne l’instance courante pour chaînage.
     */
    public function setReason($reason)
    {
        $this->reason = $reason;
        return $this;
    }

    /**
     * Définit l'identifiant de la transaction à rembourser.
     *
     * @param string $tid Identifiant unique de la transaction.
     * @return $this Retourne l’instance courante pour chaînage.
     */
    public function setTid($tid)
    {
        $this->tid = $tid;
        return $this;
    }

    /**
     * Définit la langue à utiliser pour la réponse.
     *
     * @param string $language Code langue (ex. : fr, en).
     * @return $this Retourne l’instance courante pour chaînage.
     */
    public function setLanguage($language)
    {
        $this->language = $language;
        return $this;
    }
}
