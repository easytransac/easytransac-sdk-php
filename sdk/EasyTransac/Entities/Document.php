<?php

namespace EasyTransac\Entities;

/**
 * Représente un document lié à un client ou à une transaction.
 *
 * Cette entité permet de stocker et de manipuler des documents transmis
 * pour vérification (justificatifs, pièces d’identité, etc.).
 *
 * @package EasyTransac\Entities
 * @copyright EasyTransac
 */
class Document extends Entity
{
    /**
     * Identifiant unique du document.
     *
     * @var string|null
     * @map:Id
     */
    protected $id = null;

    /**
     * Type du document (ex : 'IDCard', 'Invoice', etc.).
     *
     * @var string|null
     * @map:DocumentType
     */
    protected $documentType = null;

    /**
     * Statut du document (ex : 'Pending', 'Validated', 'Refused').
     *
     * @var string|null
     * @map:Status
     */
    protected $status = null;

    /**
     * Date de création du document.
     *
     * @var string|null
     * @map:Date
     */
    protected $date = null;

    /**
     * Date de la dernière mise à jour du document.
     *
     * @var string|null
     * @map:DateUpdated
     */
    protected $dateUpdated = null;

    /**
     * Contenu encodé du document (souvent en base64).
     *
     * @var string|null
     * @map:Content
     */
    protected $content = null;

    /**
     * Commentaire associé au document (souvent utile en cas de refus).
     *
     * @var string|null
     * @map:Comment
     */
    protected $comment = null;

    /**
     * Extension du fichier (ex : 'pdf', 'jpg', 'png').
     *
     * @var string|null
     * @map:Extension
     */
    protected $extension = null;

    /**
     * Retourne l'identifiant du document.
     *
     * @return string|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Retourne le type du document.
     *
     * @return string|null
     */
    public function getDocumentType()
    {
        return $this->documentType;
    }

    /**
     * Retourne le statut du document.
     *
     * @return string|null
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Retourne la date de création du document.
     *
     * @return string|null
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Retourne la date de dernière mise à jour du document.
     *
     * @return string|null
     */
    public function getDateUpdated()
    {
        return $this->dateUpdated;
    }

    /**
     * Retourne le contenu encodé du document.
     *
     * @return string|null
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Retourne le commentaire associé au document.
     *
     * @return string|null
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Retourne l’extension du fichier.
     *
     * @return string|null
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * Définit le contenu du document.
     *
     * @param string $content Contenu encodé (base64 par exemple).
     * @return $this
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * Définit le type du document.
     *
     * @param string $documentType Type attendu (ex : 'IDCard').
     * @return $this
     */
    public function setDocumentType($documentType)
    {
        $this->documentType = $documentType;
        return $this;
    }

    /**
     * Définit l'extension du document.
     *
     * @param string $extension Extension de fichier (ex : 'jpg', 'pdf').
     * @return $this
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;
        return $this;
    }
}
