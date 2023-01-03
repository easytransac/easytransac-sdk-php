<?php

namespace EasyTransac\Entities;

/**
 * Représente la réponse des requêtes "DirectPayment", "OneClickPayment", "PaymentStatus" et "PaymentRefund".
 * Cette entité regroupe toutes les informations relatives à une transaction réalisée via EasyTransac.
 *
 * @copyright EasyTransac
 */
class DoneTransaction extends Entity
{
    /** @map:RequestId **/
    protected $requestId = null;

    /** @map:OriginalRequestId **/
    protected $originalRequestId = null;

    /** @map:RequestAttempt **/
    protected $requestAttempt = null;

    /** @map:OperationType **/
    protected $operationType = null;

    /** @map:PaymentMethod **/
    protected $paymentMethod = null;

    /** @map:Tid **/
    protected $tid = null;

    /** @map:Uid **/
    protected $uid = null;

    /** @map:OrderId **/
    protected $orderId = null;

    /** @map:Status **/
    protected $status = null;

    /** @map:Date **/
    protected $date = null;

    /** @map:DateRefund **/
    protected $dateRefund = null;

    /** @map:AmountRefund **/
    protected $amountRefund = null;

    /** @map:DateChargeback **/
    protected $dateChargeback = null;

    /** @map:DateRepresentment **/
    protected $dateRepresentment = null;

    /** @map:Amount **/
    protected $amount = null;

    /** @map:FixFees **/
    protected $fixFees = null;

    /** @map:Message **/
    protected $message = null;

    /** @map:3DSecure **/
    protected $secure = null;

    /** @map:OneClick **/
    protected $oneClick = null;

    /** @map:MultiplePayments **/
    protected $multiplePayments = null;

    /** @map:Rebill **/
    protected $rebill = null;

    /** @map:OriginalPaymentTid **/
    protected $originalPaymentTid = null;

    /** @map:Alias **/
    protected $alias = null;

    /** @map:Error **/
    protected $error = null;

    /** @map:AdditionalError **/
    protected $additionalError = null;

    /** @map:3DSecureUrl **/
    protected $secureUrl = null;

    /** @object:Client **/
    protected $client = null;

    /** @map:MandateUrl **/
    protected $mandateUrl = null;

    /** @map:RedirectUrl **/
    protected $redirectUrl = null;

    /** @map:Test **/
    protected $test = null;

    /**
     * Retourne l'URL 3D Secure si disponible.
     *
     * @return string|null URL 3DSecure ou null si non disponible.
     */
    public function getSecureUrl()
    {
        return $this->secureUrl;
    }

    /**
     * Retourne le nombre de tentatives de la requête.
     *
     * @return int|null Nombre de tentatives ou null.
     */
    public function getRequestAttempt()
    {
        return $this->requestAttempt;
    }

    /**
     * Retourne l'identifiant de la requête d'origine.
     *
     * @return string|null Identifiant de la requête d'origine ou null.
     */
    public function getOriginalRequestId()
    {
        return $this->originalRequestId;
    }

    /**
     * Retourne le type d'opération de la transaction.
     *
     * @return string|null Type d'opération ou null.
     */
    public function getOperationType()
    {
        return $this->operationType;
    }

    /**
     * Retourne l'erreur additionnelle éventuelle.
     *
     * @return string|null Message d'erreur additionnelle ou null.
     */
    public function getAdditionalError()
    {
        return $this->additionalError;
    }

    /**
     * Retourne le message d'erreur éventuel.
     *
     * @return string|null Message d'erreur ou null.
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * Retourne l'alias de la transaction.
     *
     * @return string|null Alias ou null.
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * Retourne l'identifiant du paiement original.
     *
     * @return string|null Identifiant du paiement original ou null.
     */
    public function getOriginalPaymentTid()
    {
        return $this->originalPaymentTid;
    }

    /**
     * Indique si la transaction est un réabonnement.
     *
     * @return bool|null True si réabonnement, sinon null.
     */
    public function getRebill()
    {
        return $this->rebill;
    }

    /**
     * Indique si la transaction fait partie d'un paiement multiple.
     *
     * @return bool|null True si paiement multiple, sinon null.
     */
    public function getMultiplePayments()
    {
        return $this->multiplePayments;
    }

    /**
     * Indique si la transaction est un paiement OneClick.
     *
     * @return bool|null True si OneClick, sinon null.
     */
    public function getOneClick()
    {
        return $this->oneClick;
    }

    /**
     * Indique si la transaction a été sécurisée 3D Secure.
     *
     * @return bool|null True si 3DSecure, sinon null.
     */
    public function getSecure()
    {
        return $this->secure;
    }

    /**
     * Retourne le message associé à la transaction.
     *
     * @return string|null Message ou null.
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Retourne les frais fixes appliqués à la transaction.
     *
     * @return float|null Montant des frais fixes ou null.
     */
    public function getFixFees()
    {
        return $this->fixFees;
    }

    /**
     * Retourne le montant de la transaction.
     *
     * @return float|null Montant ou null.
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Retourne la date de représentation (en cas de rejet).
     *
     * @return string|null Date de représentation ou null.
     */
    public function getDateRepresentment()
    {
        return $this->dateRepresentment;
    }

    /**
     * Retourne la date de chargeback (rétrofacturation).
     *
     * @return string|null Date de chargeback ou null.
     */
    public function getDateChargeback()
    {
        return $this->dateChargeback;
    }

    /**
     * Retourne la date de remboursement.
     *
     * @return string|null Date de remboursement ou null.
     */
    public function getDateRefund()
    {
        return $this->dateRefund;
    }

    /**
     * Retourne le montant remboursé.
     *
     * @return float|null Montant remboursé ou null.
     */
    public function getAMountRefund()
    {
        return $this->amountRefund;
    }

    /**
     * Retourne la date de la transaction.
     *
     * @return string|null Date ou null.
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Retourne le statut de la transaction.
     *
     * @return string|null Statut ou null.
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Retourne l'identifiant de la commande associée.
     *
     * @return string|null OrderId ou null.
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * Retourne l'identifiant utilisateur.
     *
     * @return string|null Uid ou null.
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Retourne l'identifiant de transaction.
     *
     * @return string|null Tid ou null.
     */
    public function getTid()
    {
        return $this->tid;
    }

    /**
     * Retourne l'identifiant de la requête.
     *
     * @return string|null RequestId ou null.
     */
    public function getRequestId()
    {
        return $this->requestId;
    }

    /**
     * Retourne l'URL du mandat SEPA si disponible.
     *
     * @return string|null URL du mandat ou null.
     */
    public function getMandateUrl()
    {
        return $this->mandateUrl;
    }

    /**
     * Retourne l'URL de redirection si disponible.
     *
     * @return string|null URL de redirection ou null.
     */
    public function getRedirectUrl()
    {
        return $this->redirectUrl;
    }

    /**
     * Indique si la transaction est en mode test.
     *
     * @return bool|null True si test, sinon null.
     */
    public function getTest()
    {
        return $this->test;
    }

    /**
     * Retourne la méthode de paiement utilisée.
     *
     * @return string|null Méthode de paiement ou null.
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * Retourne le client associé à la transaction.
     *
     * @return Client|null Objet Client ou null.
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Indique si la transaction a été capturée.
     *
     * @return bool True si capturée, sinon false.
     */
    public function isCaptured()
    {
        return $this->status === 'captured';
    }

    /**
     * Indique si la transaction est en attente.
     *
     * @return bool True si en attente, sinon false.
     */
    public function isPending()
    {
        return $this->status === 'pending';
    }
}
