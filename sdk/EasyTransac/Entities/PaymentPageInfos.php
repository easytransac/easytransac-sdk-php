<?php

namespace EasyTransac\Entities;

/**
 * Représente la réponse de la requête "PaymentPage".
 * Cette entité contient les informations retournées lors de la création 
 * d'une page de paiement via l’API EasyTransac.
 *
 * @copyright EasyTransac
 */
class PaymentPageInfos extends Entity
{
    /**
     * Identifiant unique de la requête de création de page.
     *
     * @var string|null
     * @map:RequestId
     */
    protected $requestId = null;

    /**
     * Type d'opération (ex. : debit, credit, refund...).
     *
     * @var string|null
     * @map:OperationType
     */
    protected $operationType = null;

    /**
     * Type d'application initiant la requête (web, api, etc.).
     *
     * @var string|null
     * @map ApplicationType
     */
    protected $applicationType = null;

    /**
     * Statut actuel de la page de paiement (ex. : created, expired...).
     *
     * @var string|null
     * @map:Status
     */
    protected $status = null;

    /**
     * Date de création de la page de paiement.
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
     * Montant affiché ou attendu sur la page de paiement (en centimes).
     *
     * @var int|null
     * @map:Amount
     */
    protected $amount = null;

    /**
     * Indique si 3D Secure est activé pour la transaction.
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
     * Adresse email du client associée à la transaction.
     *
     * @var string|null
     * @map:Email
     */
    protected $email = null;

    /**
     * Langue utilisée sur la page de paiement.
     *
     * @var string|null
     * @map:Language
     */
    protected $language = null;

    /**
     * Indique si la transaction est en mode live (production) ou test.
     *
     * @var bool|null
     * @map:Live
     */
    protected $live = null;

    /**
     * Méthode de paiement prévue (CB, SEPA, etc.).
     *
     * @var string|null
     * @map:PaymentMethod
     */
    protected $paymentMethod = null;

    /**
     * Récupère l'identifiant unique de la requête.
     *
     * @return string|null
     */
    public function getRequestId()
    {
        return $this->requestId;
    }

    /**
     * Récupère le type d'opération.
     *
     * @return string|null
     */
    public function getOperationType()
    {
        return $this->operationType;
    }

    /**
     * Récupère le statut actuel de la page.
     *
     * @return string|null
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Récupère la date de création de la page.
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
     * Récupère le montant associé à la page de paiement.
     *
     * @return int|null
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Indique si 3D Secure est activé.
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
     * Récupère l’adresse email associée à la transaction.
     *
     * @return string|null
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Récupère la langue définie pour la page de paiement.
     *
     * @return string|null
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Indique si la transaction est en environnement réel.
     *
     * @return bool|null
     */
    public function getLive()
    {
        return $this->live;
    }

    /**
     * Récupère la méthode de paiement définie.
     *
     * @return string|null
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * Récupère le type d'application.
     *
     * @return string|null
     */
    public function getApplicationType()
    {
        return $this->applicationType;
    }
}
