<?php

namespace EasyTransac\Entities;

/**
 * Représente la réponse de la requête "payouts".
 * Cette entité permet de récupérer les détails des virements effectués à un utilisateur via l’API EasyTransac.
 * Documentation officielle : https://www.easytransac.com/fr/documentation#tag/API-User/paths/~1api~1user~1payouts/post
 *
 * @copyright EasyTransac
 */
class PayoutsListResponse extends Entity
{
    /**
     * Identifiant unique du virement.
     *
     * @var string|null
     * @map:Id
     */
    protected $id = null;

    /**
     * Identifiant de l’utilisateur ayant reçu le virement.
     *
     * @var string|null
     * @map:UserId
     */
    protected $userId = null;

    /**
     * Statut du virement (ex. : pending, done, failed).
     *
     * @var string|null
     * @map:Status
     */
    protected $status = null;

    /**
     * Date de traitement du virement.
     *
     * @var string|null
     * @map:Date
     */
    protected $date = null;

    /**
     * Montant transféré (en centimes).
     *
     * @var int|null
     * @map:Amount
     */
    protected $amount = null;

    /**
     * Devise utilisée (ex. : EUR).
     *
     * @var string|null
     * @map:Currency
     */
    protected $currency = null;

    /**
     * IBAN utilisé pour effectuer le virement.
     *
     * @var string|null
     * @map:Iban
     */
    protected $iban = null;

    /**
     * Code BIC de la banque du destinataire.
     *
     * @var string|null
     * @map:Bic
     */
    protected $bic = null;

    /**
     * Raison ou commentaire associé au virement.
     *
     * @var string|null
     * @map:Reason
     */
    protected $reason = null;

    /**
     * Récupère l'identifiant du virement.
     *
     * @return string|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Récupère l'identifiant de l'utilisateur.
     *
     * @return string|null
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Récupère le statut du virement.
     *
     * @return string|null
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Récupère la date du virement.
     *
     * @return string|null
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Récupère le montant transféré.
     *
     * @return int|null
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Récupère la devise utilisée.
     *
     * @return string|null
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Récupère l’IBAN du compte bénéficiaire.
     *
     * @return string|null
     */
    public function getIban()
    {
        return $this->iban;
    }

    /**
     * Récupère le code BIC de la banque.
     *
     * @return string|null
     */
    public function getBic()
    {
        return $this->bic;
    }

    /**
     * Récupère la raison associée au virement.
     *
     * @return string|null
     */
    public function getReason()
    {
        return $this->reason;
    }
}
