<?php

namespace EasyTransac\Entities;

/**
 * Représente les paramètres de la requête "adddocument".
 *
 * Cette entité permet d'associer un document à un client ou à un utilisateur,
 * dans le cadre de l’envoi ou de la gestion de justificatifs via l’API.
 *
 * @package EasyTransac\Entities
 * @copyright EasyTransac
 */
class DocumentRequest extends Entity
{
    /**
     * Client auquel le document est lié.
     *
     * @var Customer|null
     * @object:Customer
     */
    protected $customer = null;

    /**
     * Utilisateur auquel le document est lié.
     *
     * @var User|null
     * @object:User
     */
    protected $User = null;

    /**
     * Document à ajouter ou mettre à jour.
     *
     * @var Document|null
     * @object:Document
     */
    protected $document = null;

    /**
     * Identifiant d’un document existant (pour mise à jour ou référence).
     *
     * @var string|null
     * @map:DocumentId
     */
    protected $documentId = null;

    /**
     * Indique si le contenu du document doit être retourné.
     *
     * @var bool|null
     * @map:ShowContent
     */
    protected $showContent = null;

    /**
     * Définit le client associé à la requête.
     *
     * @param Customer $customer
     * @return $this
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;
        return $this;
    }

    /**
     * Définit l'utilisateur associé à la requête.
     *
     * @param User $User
     * @return $this
     */
    public function setUser($User)
    {
        $this->User = $User;
        return $this;
    }

    /**
     * Définit le document à envoyer ou modifier.
     *
     * @param Document $document
     * @return $this
     */
    public function setDocument($document)
    {
        $this->document = $document;
        return $this;
    }

    /**
     * Définit l’identifiant d’un document existant.
     *
     * @param string $documentId
     * @return $this
     */
    public function setDocumentId($documentId)
    {
        $this->documentId = $documentId;
        return $this;
    }

    /**
     * Indique si le contenu du document doit être retourné dans la réponse.
     *
     * @param bool $showContent
     * @return $this
     */
    public function setShowContent($showContent)
    {
        $this->showContent = $showContent;
        return $this;
    }
}
