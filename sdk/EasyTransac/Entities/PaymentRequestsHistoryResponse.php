<?php

namespace EasyTransac\Entities;

/**
 * Représente la réponse de l’historique des demandes de paiement.
 * Cette entité contient les informations retournées par l’API EasyTransac 
 * concernant les requêtes de paiement effectuées.
 *
 * URL de la documentation :
 * https://www.easytransac.com/fr/documentation#tag/API-Payment/paths/~1api~1payment~1requests/post
 *
 * @copyright EasyTransac
 */
class PaymentRequestsHistoryResponse extends Entity
{
    /**
     * Identifiant unique de la demande de paiement.
     *
     * @var string|null
     * @map:RequestId
     */
    protected $requestId = null;

    /**
     * Type d’opération (ex. : debit, refund...).
     *
     * @var string|null
     * @map:OperationType
     */
    protected $operationType = null;

    /**
     * Méthode de paiement utilisée (CB, SEPA, etc.).
     *
     * @var string|null
     * @map:PaymentMethod
     */
    protected $paymentMethod = null;

    /**
     * Statut actuel de la demande (ex. : captured, pending, done...).
     *
     * @var string|null
     * @map:Status
     */
    protected $status = null;

    /**
     * Date de création de la demande.
     *
     * @var string|null
     * @map:Date
     */
    protected $date = null;

    /**
     * Date d’envoi de la demande.
     *
     * @var string|null
     * @map:DateSent
     */
    protected $dateSent = null;

    /**
     * Montant de la demande (en centimes).
     *
     * @var int|null
     * @map:Amount
     */
    protected $amount = null;

    /**
     * Indique si la demande est protégée par 3D Secure.
     *
     * @var bool|null
     * @map:3DSecure
     */
    protected $secure = null;

    /**
     * URL de la page de paiement générée.
     *
     * @var string|null
     * @map:PageUrl
     */
    protected $pageUrl = null;

    /**
     * Adresse email associée à la demande.
     *
     * @var string|null
     * @map:Email
     */
    protected $email = null;

    /**
     * Numéro de téléphone du destinataire.
     *
     * @var string|null
     * @map:Phone
     */
    protected $phone = null;

    /**
     * Indique si la transaction est en environnement de production.
     *
     * @var bool|null
     * @map:Live
     */
    protected $live = null;

    /**
     * Langue utilisée pour la demande.
     *
     * @var string|null
     * @map:Language
     */
    protected $language = null;

    /**
     * Récupère l’identifiant de la demande.
     *
     * @return string|null
     */
    public function getRequestId()
    {
        return $this->requestId;
    }

    /**
     * Récupère le type d’opération.
     *
     * @return string|null
     */
    public function getOperationType()
    {
        return $this->operationType;
    }

    /**
     * Récupère la méthode de paiement.
     *
     * @return string|null
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * Récupère le statut de la demande.
     *
     * @return string|null
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Récupère la date de création.
     *
     * @return string|null
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Récupère la date d’envoi de la demande.
     *
     * @return string|null
     */
    public function getDateSent()
    {
        return $this->dateSent;
    }

    /**
     * Récupère le montant demandé.
     *
     * @return int|null
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Indique si la demande est en 3D Secure.
     *
     * @return bool|null
     */
    public function getSecure()
    {
        return $this->secure;
    }

    /**
     * Récupère l’URL de la page de paiement.
     *
     * @return string|null
     */
    public function getPageUrl()
    {
        return $this->pageUrl;
    }

    /**
     * Récupère l’adresse email du destinataire.
     *
     * @return string|null
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Récupère le numéro de téléphone du destinataire.
     *
     * @return string|null
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Indique si la demande a été faite en environnement live.
     *
     * @return bool|null
     */
    public function getLive()
    {
        return $this->live;
    }

    /**
     * Récupère la langue de la demande.
     *
     * @return string|null
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Vérifie si la demande a été capturée.
     *
     * @return bool
     */
    public function isCaptured()
    {
        return $this->status === 'captured';
    }

    /**
     * Vérifie si la demande est en attente.
     *
     * @return bool
     */
    public function isPending()
    {
        return $this->status === 'pending';
    }

    /**
     * Vérifie si la demande est expirée.
     *
     * @return bool
     */
    public function isExpired()
    {
        return $this->status === 'expired';
    }

    /**
     * Vérifie si la demande a été annulée.
     *
     * @return bool
     */
    public function isCancelled()
    {
        return $this->status === 'cancelled';
    }

    /**
     * Vérifie si la demande est encore à envoyer.
     *
     * @return bool
     */
    public function isToSend()
    {
        return $this->status === 'tosend';
    }

    /**
     * Vérifie si la demande est verrouillée.
     *
     * @return bool
     */
    public function isLocked()
    {
        return $this->status === 'locked';
    }

    /**
     * Vérifie si la demande est finalisée.
     *
     * @return bool
     */
    public function isDone()
    {
        return $this->status === 'done';
    }
}
