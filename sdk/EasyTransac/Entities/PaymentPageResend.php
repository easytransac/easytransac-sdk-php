<?php

namespace EasyTransac\Entities;

/**
 * Représente les paramètres de la requête "PaymentPageResend".
 * Cette entité permet de renvoyer un lien de page de paiement existante via l’API EasyTransac.
 *
 * @copyright EasyTransac
 */
class PaymentPageResend extends Entity
{
    /**
     * Identifiant unique de la demande de paiement à renvoyer.
     *
     * @var string|null
     * @map:RequestId
     */
    protected $requestId = null;

    /**
     * Langue à utiliser pour le lien renvoyé (ex. : fr, en).
     *
     * @var string|null
     * @map:Language
     */
    protected $language = null;

    /**
     * Définit l'identifiant de la demande de paiement à renvoyer.
     *
     * @param string $requestId Identifiant unique généré lors de la création initiale.
     * @return $this Retourne l’instance courante pour chaînage.
     */
    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;
        return $this;
    }

    /**
     * Définit la langue à utiliser pour le renvoi du lien.
     *
     * @param string $language Code langue (ex. : fr, en).
     * @return $this Retourne l’instance courante pour chaînage.
     */
    public function setLanguage($language)
    {
        $this->language = $language;
        return $this;
    }
}
