<?php

namespace EasyTransac\Entities;

/**
 * Représente les paramètres de la requête "PaymentStatus".
 * Cette entité permet de vérifier le statut d’un paiement via différentes méthodes d’identification
 * (par TID, identifiant de commande ou identifiant de requête).
 *
 * @copyright EasyTransac
 */
class PaymentStatus extends Entity
{
    /**
     * Identifiant unique de la transaction.
     *
     * @var string|null
     * @map:Tid
     */
    protected $tid = null;

    /**
     * Identifiant de la commande associée au paiement.
     *
     * @var string|null
     * @map:OrderId
     */
    protected $orderId = null;

    /**
     * Identifiant de la requête (généré par l'API à la création de la transaction).
     *
     * @var string|null
     * @map:RequestId
     */
    protected $requestId = null;

    /**
     * Langue à utiliser pour la réponse (ex. : fr, en).
     *
     * @var string|null
     * @map:Language
     */
    protected $language = null;

    /**
     * Définit la langue souhaitée pour la réponse.
     *
     * @param string $value Code langue (ex. : fr, en).
     * @return $this Retourne l’instance courante pour chaînage.
     */
    public function setLanguage($value)
    {
        $this->language = $value;
        return $this;
    }

    /**
     * Définit l’identifiant de la transaction (TID).
     *
     * @param string $value Identifiant unique de la transaction.
     * @return $this Retourne l’instance courante pour chaînage.
     */
    public function setTid($value)
    {
        $this->tid = $value;
        return $this;
    }

    /**
     * Définit l’identifiant de commande.
     *
     * @param string $value Identifiant défini par le commerçant.
     * @return $this Retourne l’instance courante pour chaînage.
     */
    public function setOrderId($value)
    {
        $this->orderId = $value;
        return $this;
    }

    /**
     * Définit l’identifiant de la requête généré par l’API.
     *
     * @param string $value Identifiant de requête.
     * @return $this Retourne l’instance courante pour chaînage.
     */
    public function setRequestId($value)
    {
        $this->requestId = $value;
        return $this;
    }
}
