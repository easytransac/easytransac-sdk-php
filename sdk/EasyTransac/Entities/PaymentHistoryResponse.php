<?php

namespace EasyTransac\Entities;

/**
 * Représente la réponse de l’historique de paiement.
 * Cette entité regroupe l’ensemble des informations retournées par EasyTransac
 * suite à une requête de consultation de l’historique des paiements.
 *
 * @copyright EasyTransac
 */
class PaymentHistoryResponse extends Entity
{
    /** 
     * Type d'opération (ex. : debit, refund...).
     *
     * @var string|null
     * @map:OperationType 
     */
    protected $operationType = null;

    /** 
     * Méthode de paiement utilisée (CB, SEPA...).
     *
     * @var string|null
     * @map:PaymentMethod 
     */
    protected $paymentMethod = null;

    /** 
     * Type d'application à l'origine du paiement.
     *
     * @var string|null
     * @map ApplicationType 
     */
    protected $applicationType = null;

    /** 
     * Transaction ID.
     *
     * @var string|null
     * @map:Tid 
     */
    protected $tid = null;

    /** 
     * Identifiant unique utilisateur.
     *
     * @var string|null
     * @map:Uid 
     */
    protected $uid = null;

    /** 
     * Identifiant de commande.
     *
     * @var string|null
     * @map:OrderId 
     */
    protected $orderId = null;

    /** 
     * Statut de la transaction (ex. : captured, pending...).
     *
     * @var string|null
     * @map:Status 
     */
    protected $status = null;

    /** 
     * Date de la transaction.
     *
     * @var string|null
     * @map:Date 
     */
    protected $date = null;

    /** 
     * Date de remboursement éventuel.
     *
     * @var string|null
     * @map:DateRefund 
     */
    protected $dateRefund = null;

    /** 
     * Date de chargeback éventuel.
     *
     * @var string|null
     * @map:DateChargeback 
     */
    protected $dateChargeback = null;

    /** 
     * Date de représentation en cas de contestation.
     *
     * @var string|null
     * @map:DateRepresentment 
     */
    protected $dateRepresentment = null;

    /** 
     * Montant de la transaction (en centimes).
     *
     * @var int|null
     * @map:Amount 
     */
    protected $amount = null;

    /** 
     * Adresse IP du client.
     *
     * @var string|null
     * @map:ClientIp 
     */
    protected $clientIp = null;

    /** 
     * Pays associé à l'adresse IP du client.
     *
     * @var string|null
     * @map:ClientIpCountry 
     */
    protected $clientIpCountry = null;

    /** 
     * Code ISO de la devise utilisée.
     *
     * @var string|null
     * @map:Currency 
     */
    protected $currency = null;

    /** 
     * Nom lisible de la devise utilisée.
     *
     * @var string|null
     * @map:CurrencyText 
     */
    protected $currencyText = null;

    /** 
     * Frais fixes appliqués à la transaction.
     *
     * @var float|null
     * @map:FixFees 
     */
    protected $fixFees = null;

    /** 
     * Message complémentaire de l'API.
     *
     * @var string|null
     * @map:Message 
     */
    protected $message = null;

    /** 
     * Statut de l'utilisation du 3D Secure.
     *
     * @var bool|null
     * @map:3DSecure 
     */
    protected $secure = null;

    /** 
     * Indique si la transaction est de type One Click.
     *
     * @var bool|null
     * @map:OneClick 
     */
    protected $oneClick = null;

    /** 
     * Détails de la carte bancaire utilisée.
     *
     * @var CreditCard|null
     * @object:CreditCard 
     */
    protected $creditCard = null;

    /** 
     * Indique si la transaction est en environnement de test.
     *
     * @var bool|null
     * @map:Test 
     */
    protected $test = null;

    /** 
     * Langue utilisée lors de la transaction.
     *
     * @var string|null
     * @map:Language 
     */
    protected $language = null;

    /** 
     * Message d’erreur éventuel.
     *
     * @var string|null
     * @map:Error 
     */
    protected $error = null;

    /** 
     * Détail supplémentaire sur une erreur.
     *
     * @var string|null
     * @map:AdditionalError 
     */
    protected $additionalError = null;

    /** 
     * Informations du client ayant réalisé la transaction.
     *
     * @var Client|null
     * @object:Client 
     */
    protected $client = null;

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
     * Récupère la méthode de paiement utilisée.
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

    /**
     * Récupère l'identifiant de transaction.
     *
     * @return string|null
     */
    public function getTid()
    {
        return $this->tid;
    }

    /**
     * Récupère l'identifiant utilisateur.
     *
     * @return string|null
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Récupère l'identifiant de commande.
     *
     * @return string|null
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * Récupère le statut de la transaction.
     *
     * @return string|null
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Récupère la date de la transaction.
     *
     * @return string|null
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Récupère la date de remboursement.
     *
     * @return string|null
     */
    public function getDateRefund()
    {
        return $this->dateRefund;
    }

    /**
     * Récupère la date de chargeback.
     *
     * @return string|null
     */
    public function getDateChargeback()
    {
        return $this->dateChargeback;
    }

    /**
     * Récupère la date de représentation.
     *
     * @return string|null
     */
    public function getDateRepresentment()
    {
        return $this->dateRepresentment;
    }

    /**
     * Récupère le montant de la transaction.
     *
     * @return int|null
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Récupère l'adresse IP du client.
     *
     * @return string|null
     */
    public function getClientIp()
    {
        return $this->clientIp;
    }

    /**
     * Récupère le pays associé à l'IP client.
     *
     * @return string|null
     */
    public function getClientIpCountry()
    {
        return $this->clientIpCountry;
    }

    /**
     * Récupère le code de devise.
     *
     * @return string|null
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Récupère le nom de la devise.
     *
     * @return string|null
     */
    public function getCurrencyText()
    {
        return $this->currencyText;
    }

    /**
     * Récupère les frais fixes appliqués.
     *
     * @return float|null
     */
    public function getFixFees()
    {
        return $this->fixFees;
    }

    /**
     * Récupère le message de réponse.
     *
     * @return string|null
     */
    public function getMessage()
    {
        return $this->message;
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
     * Indique si la transaction est One Click.
     *
     * @return bool|null
     */
    public function getOneClick()
    {
        return $this->oneClick;
    }

    /**
     * Récupère les informations de la carte bancaire.
     *
     * @return CreditCard|null
     */
    public function getCreditCard()
    {
        return $this->creditCard;
    }

    /**
     * Indique si la transaction est en mode test.
     *
     * @return bool|null
     */
    public function getTest()
    {
        return $this->test;
    }

    /**
     * Récupère la langue de la transaction.
     *
     * @return string|null
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Récupère le message d'erreur.
     *
     * @return string|null
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * Récupère l'erreur additionnelle.
     *
     * @return string|null
     */
    public function getAdditionalError()
    {
        return $this->additionalError;
    }

    /**
     * Récupère les informations du client.
     *
     * @return Client|null
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Vérifie si le paiement a été capturé.
     *
     * @return bool
     */
    public function isCaptured()
    {
        return $this->status === 'captured';
    }

    /**
     * Vérifie si le paiement est en attente.
     *
     * @return bool
     */
    public function isPending()
    {
        return $this->status === 'pending';
    }
}
