<?php

namespace EasyTransac\Entities;

/**
 * Représente les arguments de la requête "Capture" (capture d'un paiement pré-autorisé).
 * 
 * @copyright EasyTransac
 */
class PaymentCapture extends Entity
{
    /**
     * Identifiant unique de la transaction à capturer.
     * 
     * @var string|null
     * @map:Tid
     */
    protected $tid = null;

    /**
     * Montant à capturer (en centimes).
     * 
     * @var int|null
     * @map:Amount
     */
    protected $amount = null;

    /**
     * Langue de la requête (ex : 'fr', 'en').
     * 
     * @var string|null
     * @map:Language
     */
    protected $language = null;

    /**
     * Définit le montant à capturer.
     *
     * @param int $amount Montant en centimes.
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * Définit l'identifiant de la transaction à capturer.
     *
     * @param string $tid Identifiant de la transaction.
     * @return $this
     */
    public function setTid($tid)
    {
        $this->tid = $tid;
        return $this;
    }

    /**
     * Définit la langue de la requête.
     *
     * @param string $language Code langue (ex : 'fr').
     * @return $this
     */
    public function setLanguage($language)
    {
        $this->language = $language;
        return $this;
    }
}