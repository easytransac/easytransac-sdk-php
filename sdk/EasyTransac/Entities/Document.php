<?php

namespace EasyTransac\Entities;

/**
 * Represents a document linked to a customer or a transaction.
 *
 * This entity is used to store and handle documents submitted for
 * verification (proofs, IDs, etc.).
 *
 * @package EasyTransac\
 * 
 */
class Document extends Entity
{
    /**
     * Unique document identifier.
     *
     * @var string|null
     * @map:Id
     */
    protected $id = null;

    /**
     * Document type (e.g., 'IDCard', 'Invoice', etc.).
     *
     * @var string|null
     * @map:DocumentType
     */
    protected $documentType = null;

    /**
     * Document status (e.g., 'Pending', 'Validated', 'Refused').
     *
     * @var string|null
     * @map:Status
     */
    protected $status = null;

    /**
     * Document creation date.
     *
     * @var string|null
     * @map:Date
     */
    protected $date = null;

    /**
     * Last update date of the document.
     *
     * @var string|null
     * @map:DateUpdated
     */
    protected $dateUpdated = null;

    /**
     * Encoded document content (often base64).
     *
     * @var string|null
     * @map:Content
     */
    protected $content = null;

    /**
     * Comment associated with the document (useful in case of refusal).
     *
     * @var string|null
     * @map:Comment
     */
    protected $comment = null;

    /**
     * File extension (e.g., 'pdf', 'jpg', 'png').
     *
     * @var string|null
     * @map:Extension
     */
    protected $extension = null;

    /**
     * Returns the document identifier.
     *
     * @return string|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the document type.
     *
     * @return string|null
     */
    public function getDocumentType()
    {
        return $this->documentType;
    }

    /**
     * Returns the document status.
     *
     * @return string|null
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Returns the document creation date.
     *
     * @return string|null
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Returns the document last update date.
     *
     * @return string|null
     */
    public function getDateUpdated()
    {
        return $this->dateUpdated;
    }

    /**
     * Returns the encoded document content.
     *
     * @return string|null
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Returns the comment associated with the document.
     *
     * @return string|null
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Returns the file extension.
     *
     * @return string|null
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * Sets the document content.
     *
     * @param string $content Encoded content (e.g., base64).
     * @return $this
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * Sets the document type.
     *
     * @param string $documentType Expected type (e.g., 'IDCard').
     * @return $this
     */
    public function setDocumentType($documentType)
    {
        $this->documentType = $documentType;
        return $this;
    }

    /**
     * Sets the document extension.
     *
     * @param string $extension File extension (e.g., 'jpg', 'pdf').
     * @return $this
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;
        return $this;
    }
}
