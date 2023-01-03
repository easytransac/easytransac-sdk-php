<?php

namespace EasyTransac\Core;

/**
 * Interface ICallerModifier
 *
 * Permet de modifier dynamiquement le comportement des appels HTTP
 * effectués via un objet ICaller, par exemple en changeant le nom
 * de la méthode appelée ou les paramètres transmis.
 *
 * @package EasyTransac\Core
 */
interface ICallerModifier
{
    /**
     * Applique des modifications avant l'appel.
     *
     * @param $services Instance du gestionnaire de services.
     * @param $funcName Nom de la méthode à modifier.
     * @param $params Paramètres initiaux de l'appel.
     * @return void
     */
    public function execute($services, $funcName, $params);

    /**
     * Retourne le nom de la méthode modifiée ou l'URL complète à appeler.
     *
     * @return string
     */
    public function getFuncName();

    /**
     * Retourne les paramètres modifiés à envoyer à l'appel.
     *
     * @return array
     */
    public function getParams();
}
