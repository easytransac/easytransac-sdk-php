<?php

namespace EasyTransac\Entities;

/**
 * Représente un virement entre deux professionnels (P2P).
 *
 * Cette entité permet de décrire les paramètres d'un transfert P2P
 * comme les identifiants des utilisateurs, le montant, la langue, etc.
 *
 * @package EasyTransac\Entities
 * @copyright EasyTransac
 */
class P2PTransfer extends Entity
{
    /**
     * Identifiant du compte source du transfert.
     *
     * @var string|null
     * @map:From
     */
    protected $from = null;

    /**
     * Identifiant du compte destinataire du transfert.
     *
     * @var string|null
     * @map:To
     */
    protected $to = null;

    /**
     * Identifiant de la transaction.
     *
     * @var string|null
     * @map:Tid
     */
    protected $tid = null;

    /**
     * Montant du transfert (en centimes).
     *
     * @var int|null
     * @map:Amount
     */
    protected $amount = null;

    /**
     * Description du virement.
     *
     * @var string|null
     * @map:Description
     */
    protected $description = null;

    /**
     * Langue utilisée (ex: 'fr').
     *
     * @var string|null
     * @map:Language
     */
    protected $language = null;

    /**
     * Identifiant de la transaction originale si le transfert est lié à une opération précédente.
     *
     * @var string|null
     * @map:OriginalTid
     */
    protected $originalTid = null;

    /**
     * Statut du transfert (ex: 'success', 'failed').
     *
     * @var string|null
     * @map:Status
     */
    protected $status = null;

    /**
     * Date du transfert.
     *
     * @var string|null
     * @map:Date
     */
    protected $date = null;

    /**
     * Récupère l'identifiant de l'expéditeur du transfert.
     *
     * @return string|null
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * Définit l'identifiant de l'expéditeur du transfert.
     *
     * @param string $value
     * @return $this
     */
    public function setFrom($value)
    {
        $this->from = $value;
        return $this;
    }

    /**
     * Récupère l'identifiant du destinataire du transfert.
     *
     * @return string|null
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * Définit l'identifiant du destinataire du transfert.
     *
     * @param string $value
     * @return $this
     */
    public function setTo($value)
    {
        $this->to = $value;
        return $this;
    }

    /**
     * Définit l'identifiant de la transaction.
     *
     * @param string $value
     * @return $this
     */
    public function setTid($value)
    {
        $this->tid = $value;
        return $this;
    }

    /**
     * Récupère le montant du transfert.
     *
     * @return int|null
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Définit le montant du transfert.
     *
     * @param int $value
     * @return $this
     */
    public function setAmount($value)
    {
        $this->amount = $value;
        return $this;
    }

    /**
     * Définit une description pour le transfert.
     *
     * @param string $value
     * @return $this
     */
    public function setDescription($value)
    {
        $this->description = $value;
        return $this;
    }

    /**
     * Définit la langue du transfert.
     *
     * @param string $value
     * @return $this
     */
    public function setLanguage($value)
    {
        $this->language = $value;
        return $this;
    }

    /**
     * Récupère la date du transfert.
     *
     * @return string|null
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Récupère l'identifiant de la transaction originale, le cas échéant.
     *
     * @return string|null
     */
    public function getOriginalTid()
    {
        return $this->originalTid;
    }

    /**
     * Récupère le statut du transfert.
     *
     * @return string|null
     */
    public function getStatus()
    {
        return $this->status;
    }
}