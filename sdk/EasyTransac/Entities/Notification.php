<?php

namespace EasyTransac\Entities;

/**
 * Représente une notification de paiement reçue par EasyTransac.
 *
 * Cette entité encapsule toutes les données d’une notification envoyée lors d’un changement
 * d’état d’une transaction : confirmation, annulation, remboursement, chargeback, etc.
 *
 * @package EasyTransac\Entities
 * @copyright EasyTransac
 */
class Notification extends Entity
{
       /**
     * Type de notification reçue (ex : 'payment', 'refund', etc.).
     *
     * @var string|null
     * @map:NotificationType
     */
    protected $notificationType = null;

    /**
     * Type d'opération concernée (ex : 'credit', 'debit').
     *
     * @var string|null
     * @map:OperationType
     */
    protected $operationType = null;

    /**
     * Identifiant unique de la requête.
     *
     * @var string|null
     * @map:RequestId
     */
    protected $requestId = null;

    /**
     * Identifiant unique de la transaction (TID).
     *
     * @var string|null
     * @map:Tid
     */
    protected $tid = null;

    /**
     * Identifiant unique du client (UID).
     *
     * @var string|null
     * @map:Uid
     */
    protected $uid = null;

    /**
     * Identifiant de la commande partenaire.
     *
     * @var string|null
     * @map:OrderId
     */
    protected $orderId = null;

    /**
     * Statut actuel de la transaction (ex : 'success', 'refused').
     *
     * @var string|null
     * @map:Status
     */
    protected $status = null;

    /**
     * Date de la transaction ou de la notification.
     *
     * @var string|null
     * @map:Date
     */
    protected $date = null;

    /**
     * Montant de la transaction (en centimes).
     *
     * @var int|null
     * @map:Amount
     */
    protected $amount = null;

    /**
     * Devise utilisée (code ISO 4217, ex : 'EUR').
     *
     * @var string|null
     * @map:Currency
     */
    protected $currency = null;

    /**
     * Frais fixes appliqués.
     *
     * @var int|null
     * @map:FixFees
     */
    protected $fixFees = null;

    /**
     * Message d’erreur ou information supplémentaire.
     *
     * @var string|null
     * @map:Message
     */
    protected $message = null;

    /**
     * Indique si la transaction utilise le 3D Secure.
     *
     * @var bool|null
     * @map:3DSecure
     */
    protected $secure = null;

    /**
     * Indique si la fonctionnalité OneClick est utilisée.
     *
     * @var bool|null
     * @map:OneClick
     */
    protected $oneClick = null;

    /**
     * Alias de la carte utilisée.
     *
     * @var string|null
     * @map:Alias
     */
    protected $alias = null;

    /**
     * Numéro partiel de la carte (masqué).
     *
     * @var string|null
     * @map:CardNumber
     */
    protected $cardNumber = null;

    /**
     * Indique si la transaction était un test.
     *
     * @var bool|null
     * @map:Test
     */
    protected $test = null;

    /**
     * Signature de validation de la notification.
     *
     * @var string|null
     * @map:Signature
     */
    protected $signature = null;

    /**
     * Données du client (objet Client).
     *
     * @var Client|null
     * @object:Client
     */
    protected $client = null;

    /**
     * Message d'erreur retourné par l'API.
     *
     * @var string|null
     * @map:Error
     */
    protected $error = null;

    /**
     * Montant remboursé, le cas échéant.
     *
     * @var int|null
     * @map:AmountRefund
     */
    protected $amountRefund = null;

    /**
     * Nombre de tentatives de requête.
     *
     * @var int|null
     * @map:RequestAttempt
     */
    protected $requestAttempt = null;

    /**
     * Méthode de paiement utilisée (ex : CB, SEPA).
     *
     * @var string|null
     * @map:PaymentMethod
     */
    protected $paymentMethod = null;

    /**
     * Identifiant de l’utilisateur.
     *
     * @var string|null
     * @map:UserId
     */
    protected $userId = null;

    /**
     * Description associée à la transaction.
     *
     * @var string|null
     * @map:Description
     */
    protected $description = null;

    /**
     * Date du remboursement si applicable.
     *
     * @var string|null
     * @map:DateRefund
     */
    protected $dateRefund = null;

    /**
     * Nom complet de la devise (ex : 'euro').
     *
     * @var string|null
     * @map:CurrencyText
     */
    protected $currencyText = null;

    /**
     * Symbole de la devise (ex : '€').
     *
     * @var string|null
     * @map:CurrencySymbol
     */
    protected $currencySymbol = null;

    /**
     * Pourcentage de frais appliqués.
     *
     * @var float|null
     * @map:FeesPercent
     */
    protected $feesPercent = null;

    /**
     * Partie fixe des frais appliqués.
     *
     * @var int|null
     * @map:FeesFixedPart
     */
    protected $feesFixedPart = null;

    /**
     * Pays d'origine de la carte bancaire.
     *
     * @var string|null
     * @map:CardCountry
     */
    protected $cardCountry = null;

    /**
     * Mois d'expiration de la carte.
     *
     * @var string|null
     * @map:CardMonth
     */
    protected $cardMonth = null;

    /**
     * Année d'expiration de la carte.
     *
     * @var string|null
     * @map:CardYear
     */
    protected $cardYear = null;

    /**
     * Type d’application ayant initié la transaction (ex : API, BackOffice).
     *
     * @var string|null
     * @map:ApplicationType
     */
    protected $applicationType = null;

    /**
     * Identifiant de la requête originale (en cas de remboursement ou de rebill).
     *
     * @var string|null
     * @map:OriginalRequestId
     */
    protected $originalRequestId = null;

    /**
     * Identifiant de la transaction de paiement initiale.
     *
     * @var string|null
     * @map:OriginalPaymentTid
     */
    protected $originalPaymentTid = null;

    /**
     * Date du chargeback si survenu.
     *
     * @var string|null
     * @map:DateChargeback
     */
    protected $dateChargeback = null;

    /**
     * Date de re-présentation si applicable.
     *
     * @var string|null
     * @map:DateRepresentment
     */
    protected $dateRepresentment = null;

    /**
     * Montant pré-autorisé.
     *
     * @var int|null
     * @map:AmountPreAuth
     */
    protected $amountPreAuth = null;

    /**
     * Adresse IP du client.
     *
     * @var string|null
     * @map:ClientIP
     */
    protected $clientIP = null;

    /**
     * Pays d'origine de l'IP client.
     *
     * @var string|null
     * @map:ClientIPCountry
     */
    protected $clientIPCountry = null;

    /**
     * Indique si la transaction est une pré-autorisation.
     *
     * @var bool|null
     * @map:PreAuth
     */
    protected $preAuth = null;

    /**
     * Indique si la transaction est B2B.
     *
     * @var bool|null
     * @map:B2B
     */
    protected $b2b = null;

    /**
     * Type de carte utilisée (Visa, MasterCard, etc.).
     *
     * @var string|null
     * @map:CardType
     */
    protected $cardType = null;

    /**
     * Indique si un paiement multiple est en cours.
     *
     * @var bool|null
     * @map:MultiplePayments
     */
    protected $multiplePayments = null;

    /**
     * Statut du paiement multiple.
     *
     * @var string|null
     * @map:MultiplePaymentsStatus
     */
    protected $multiplePaymentsStatus = null;

    /**
     * Récurrence du paiement multiple.
     *
     * @var string|null
     * @map:MultiplePaymentsRecurrence
     */
    protected $multiplePaymentsRecurrence = null;

    /**
     * Nombre de répétitions du paiement multiple.
     *
     * @var int|null
     * @map:MultiplePaymentsRepeat
     */
    protected $multiplePaymentsRepeat = null;

    /**
     * Nombre total de paiements multiples prévus.
     *
     * @var int|null
     * @map:MultiplePaymentsCount
     */
    protected $multiplePaymentsCount = null;

    /**
     * Statut du rebill (paiement récurrent).
     *
     * @var string|null
     * @map:RebillStatus
     */
    protected $rebillStatus = null;

    /**
     * Fréquence du rebill (ex : 'monthly').
     *
     * @var string|null
     * @map:RebillRecurrence
     */
    protected $rebillRecurrence = null;

    /**
     * Nombre de répétitions de rebill effectuées.
     *
     * @var int|null
     * @map:RebillCount
     */
    protected $rebillCount = null;

    /**
     * Erreur supplémentaire fournie par l’API.
     *
     * @var string|null
     * @map:AdditionalError
     */
    protected $additionalError = null;

    /**
     * URL de redirection vers le 3D Secure.
     *
     * @var string|null
     * @map:3DSecureUrl
     */
    protected $secureUrl = null;

    /**
     * URL du mandat SEPA.
     *
     * @var string|null
     * @map:MandateUrl
     */
    protected $mandateUrl = null;

    /**
     * URL de redirection générale.
     *
     * @var string|null
     * @map:RedirectUrl
     */
    protected $redirectUrl = null;

    /**
     * Image base64 d’un QR Code de paiement.
     *
     * @var string|null
     * @map:QRCodeImage
     */
    protected $qrCodeImage = null;

    /**
     * URL vers le QR Code de paiement.
     *
     * @var string|null
     * @map:QRCodeUrl
     */
    protected $qrCodeUrl = null;

    // Les getters sont maintenus ci-dessous pour accès en lecture aux propriétés.

    public function getNotificationType()
    {
        return $this->notificationType;
    }

    public function getOperationType()
    {
        return $this->operationType;
    }

    public function getRequestId()
    {
        return $this->requestId;
    }

    public function getTid()
    {
        return $this->tid;
    }

    public function getUid()
    {
        return $this->uid;
    }

    public function getOrderId()
    {
        return $this->orderId;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function getFixFees()
    {
        return $this->fixFees;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getSecure()
    {
        return $this->secure;
    }

    public function getOneClick()
    {
        return $this->oneClick;
    }

    public function getAlias()
    {
        return $this->alias;
    }

    public function getCardNumber()
    {
        return $this->cardNumber;
    }

    public function getTest()
    {
        return $this->test;
    }

    public function getSignature()
    {
        return $this->signature;
    }

    public function getClient()
    {
        return $this->client;
    }

    public function getError()
    {
        return $this->error;
    }

    public function getAmountRefund()
    {
        return $this->amountRefund;
    }

    public function getRequestAttempt()
    {
        return $this->requestAttempt;
    }

    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getDateRefund()
    {
        return $this->dateRefund;
    }

    public function getCurrencyText()
    {
        return $this->currencyText;
    }

    public function getCurrencySymbol()
    {
        return $this->currencySymbol;
    }

    public function getFeesPercent()
    {
        return $this->feesPercent;
    }

    public function getFeesFixedPart()
    {
        return $this->feesFixedPart;
    }

    public function getCardCountry()
    {
        return $this->cardCountry;
    }

    public function getCardMonth()
    {
        return $this->cardMonth;
    }

    public function getCardYear()
    {
        return $this->cardYear;
    }

    public function getApplicationType()
    {
        return $this->applicationType;
    }

    public function getOriginalRequestId()
    {
        return $this->originalRequestId;
    }

    public function getOriginalPaymentTid()
    {
        return $this->originalPaymentTid;
    }

    public function getDateChargeback()
    {
        return $this->dateChargeback;
    }

    public function getDateRepresentment()
    {
        return $this->dateRepresentment;
    }

    public function getAmountPreAuth()
    {
        return $this->amountPreAuth;
    }

    public function getClientIP()
    {
        return $this->clientIP;
    }

    public function getClientIPCountry()
    {
        return $this->clientIPCountry;
    }

    public function getPreAuth()
    {
        return $this->preAuth;
    }

    public function getB2b()
    {
        return $this->b2b;
    }

    public function getCardType()
    {
        return $this->cardType;
    }

    public function getMultiplePayments()
    {
        return $this->multiplePayments;
    }

    public function getMultiplePaymentsStatus()
    {
        return $this->multiplePaymentsStatus;
    }

    public function getMultiplePaymentsRecurrence()
    {
        return $this->multiplePaymentsRecurrence;
    }

    public function getMultiplePaymentsRepeat()
    {
        return $this->multiplePaymentsRepeat;
    }

    public function getMultiplePaymentsCount()
    {
        return $this->multiplePaymentsCount;
    }

    public function getRebillStatus()
    {
        return $this->rebillStatus;
    }

    public function getRebillRecurrence()
    {
        return $this->rebillRecurrence;
    }

    public function getRebillCount()
    {
        return $this->rebillCount;
    }

    public function getAdditionalError()
    {
        return $this->additionalError;
    }

    public function getSecureUrl()
    {
        return $this->secureUrl;
    }

    public function getMandateUrl()
    {
        return $this->mandateUrl;
    }

    public function getRedirectUrl()
    {
        return $this->redirectUrl;
    }

    public function getQrCodeImage()
    {
        return $this->qrCodeImage;
    }

    public function getQrCodeUrl()
    {
        return $this->qrCodeUrl;
    }
}
