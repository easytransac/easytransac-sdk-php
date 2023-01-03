<?php

namespace EasyTransac\Core;

/**
 * Classe utilitaire fournissant des outils de sécurité pour les échanges avec l'API EasyTransac.
 *
 * Elle est utilisée pour générer une signature sécurisée permettant de vérifier
 * l'intégrité et l'authenticité des données reçues ou envoyées.
 *
 * @package EasyTransac\Core
 */
class Security
{
    /**
     * Génère une signature SHA1 basée sur les paramètres de la requête et la clé API.
     *
     * @param $params Données à signer (array associatif, objet ou string brute)
     * @param $apiKey Clé API privée fournie par EasyTransac
     * @return string La signature calculée en SHA1
     */
    public static function getSignature($params, $apiKey): string
    {
        if (is_object($params)) {
            $params = (array) $params;
        }

        $signature = '';

        if (is_array($params)) {
            $params = array_change_key_case($params, CASE_LOWER);
            ksort($params);

            foreach ($params as $name => $value) {
                if (strcasecmp($name, 'signature') !== 0) {
                    if (is_object($value)) {
                        $value = (array) $value;
                    }

                    if (is_array($value)) {
                        $value = array_change_key_case($value, CASE_LOWER);
                        ksort($value);

                        foreach ($value as $v) {
                            $signature .= $v . '$';
                        }
                    } else {
                        $signature .= $value . '$';
                    }
                }
            }
        } else {
            $signature = (string) $params . '$';
        }

        $signature .= $apiKey;

        return sha1($signature);
    }
}
