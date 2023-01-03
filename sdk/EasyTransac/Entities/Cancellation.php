<?php

namespace EasyTransac\Entities;

/**
 * Représente les paramètres de la requête de type "Cancellation" (annulation).
 *
 * Cette entité est utilisée pour encapsuler les données nécessaires
 * à l'annulation d'une transaction via l'API EasyTransac.
 *
 * @package EasyTransac\Entities
 * @copyright EasyTransac
 */
class Cancellation extends Entity
{
    /**
     * Identifiant unique de la requête à annuler.
     *
     * Mappé sous le nom "RequestId" dans la requête API.
     *
     * @var string|null
     * @map:RequestId
     */
    protected $requestId = null;

    /**
     * Code de langue préféré pour la requête (par exemple 'fr', 'en').
     *
     * Mappé sous le nom "Language" dans la requête API.
     *
     * @var string|null
     * @map:Language
     */
    protected $language = null;

    /**
     * Définit l'identifiant unique de la requête à annuler.
     *
     * @param string $requestId L'identifiant de la requête à annuler.
     * @return $this
     */
    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;
        return $this;
    }

    /**
     * Définit la langue utilisée pour la requête d'annulation.
     *
     * @param string $language Le code langue ISO 639-1 (ex : 'fr', 'en').
     * @return $this
     */
    public function setLanguage($language)
    {
        $this->language = $language;
        return $this;
    }
}
