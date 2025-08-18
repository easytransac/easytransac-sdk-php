<?php

namespace EasyTransac\Entities;

/**
 * Represents the parameters for the "adddocument" request.
 *
 * This entity makes it possible to associate a document with a customer or a user
 * when sending or managing supporting documents via the API.
 *
 * @package EasyTransac\Entities
 * 
 */
class DocumentRequest extends Entity
{
    /**
     * Customer the document is linked to.
     *
     * @var Customer|null
     * @object:Customer
     */
    protected $customer = null;

    /**
     * User the document is linked to.
     *
     * @var User|null
     * @object:User
     */
    protected $User = null;

    /**
     * Document to add or update.
     *
     * @var Document|null
     * @object:Document
     */
    protected $document = null;

    /**
     * Identifier of an existing document (for update/reference).
     *
     * @var string|null
     * @map:DocumentId
     */
    protected $documentId = null;

    /**
     * Whether the document content should be returned.
     *
     * @var bool|null
     * @map:ShowContent
     */
    protected $showContent = null;

    /**
     * Sets the customer associated with the request.
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
     * Sets the user associated with the request.
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
     * Sets the document to send or modify.
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
     * Sets the identifier of an existing document.
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
     * Indicates whether the document content should be returned in the response.
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
