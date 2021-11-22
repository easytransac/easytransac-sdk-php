<?php

namespace EasyTransac\Core;

/**
 * Security tools
 * @copyright EasyTransac
 */
class Security
{
    /**
     * Returns the signature from a params list and api key for a request
     * @param array $params
     * @param String $apiKey
     * @return String
     */
    public static function getSignature($params, $apiKey)
    {
        if (is_object($params)) {
            $params = (array) $params;
        }

        $signature = '';
        if (is_array($params)) {
            // set keys to lower case
            $params = array_change_key_case($params, CASE_LOWER);
            // order by alpha.
            ksort($params);

            foreach ($params as $name => $valeur) {
                // if object, cast as array, we are in node
                if (is_object($valeur)) {
                    $valeur = (array) $valeur;
                }

                // if key is not "Signature"
                if (strcasecmp($name, 'signature') != 0) {
                    // if object
                    if (is_array($valeur)) {
                        // set values to lower case
                        $valeur = array_change_key_case($valeur, CASE_LOWER);
                        // order by alpha.
                        ksort($valeur);

                        // parse node values and assign value
                        foreach ($valeur as $v) {
                            $signature .= $v . '$';
                        }
                    } else {
                        // if it's a value
                        $signature .= $valeur . '$';
                    }
                }
            }
        } else {
            $signature = $params . '$';
        }

        $signature .= $apiKey;
        return sha1($signature);
    }
}
