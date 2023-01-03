<?php

namespace EasyTransac\Entities;

/**
 * Représente la réponse de la requête "cancelpage".
 * Cette entité contient les informations renvoyées après une tentative 
 * d’annulation d’une page de paiement via l’API EasyTransac.
 *
 * @copyright EasyTransac
 */
class PaymentPageCancellationInfos extends Entity
{
    /**
     * Identifiant unique de la requête d’annulation.
     *
     * @var string|null
     * @map:RequestId
     */
    protected $requestId = null;

    /**
     * Type d'opération concernée (ex. : debit, refund...).
     *
     * @var string|null
     * @map:OperationType
     */
    protected $operationType = null;

    /**
     * Statut actuel de l’opération (ex. : success, failed...).
     *
     * @var string|null
     * @map:Status
     */
    protected $status = null;

    /**
     * Date de l’opération d’annulation.
     *
     * @var string|null
     * @map:Date
     */
    protected $date = null;

    /**
     * Date d’envoi de la requête.
     *
     * @var string|null
     * @map:DateSent
     */
    protected $dateSent = null;

    /**
     * Montant concerné par l’annulation (en centimes).
     *
     * @var int|null
     * @map:Amount
     */
    protected $amount = null;

    /**
     * Statut de l'utilisation du 3D Secure pour l'opération.
     *
     * @var bool|null
     * @map:3DSecure
     */
    protected $secure = null;

    /**
     * URL de la page de paiement annulée.
     *
     * @var string|null
     * @map:PageUrl
     */
    protected $pageUrl = null;

    /**
     * Adresse e-mail liée à la transaction.
     *
     * @var string|null
     * @map:Email
     */
    protected $email = null;

    /**
     * Langue utilisée pour l'opération.
     *
     * @var string|null
     * @map:Language
     */
    protected $language = null;

    /**
     * Récupère l'identifiant de la requête.
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
     * Récupère le statut de l’opération.
     *
     * @return string|null
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Récupère la date de l’opération.
     *
     * @return string|null
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Récupère la date d’envoi de la requête.
     *
     * @return string|null
     */
    public function getDateSent()
    {
        return $this->dateSent;
    }

    /**
     * Récupère le montant concerné par l’annulation.
     *
     * @return int|null
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Indique si 3D Secure a été utilisé.
     *
     * @return bool|null
     */
    public function getSecure()
    {
        return $this->secure;
    }

    /**
     * Récupère l’URL de la page de paiement annulée.
     *
     * @return string|null
     */
    public function getPageUrl()
    {
        return $this->pageUrl;
    }

    /**
     * Récupère l’adresse email liée à la transaction.
     *
     * @return string|null
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Récupère la langue utilisée.
     *
     * @return string|null
     */
    public function getLanguage()
    {
        return $this->language;
    }
}
