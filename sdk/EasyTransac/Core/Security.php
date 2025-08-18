<?php

namespace EasyTransac\Core;

/**
 * Utility class providing security helpers for exchanges with the EasyTransac API.
 *
 * Used to generate a secure signature to verify the integrity and authenticity
 * of data received or sent.
 *
 * @package EasyTransac\Core
 */
class Security
{
    /**
     * Generates a SHA1 signature based on the request parameters and the API key.
     *
     * @param mixed  $params Data to sign (associative array, object, or raw string).
     * @param string $apiKey Private API key provided by EasyTransac.
     * @return string The computed SHA1 signature.
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
