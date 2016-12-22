<?php

namespace EasyTransac\Core;

/**
 * Security tools 
 * @author Klyde
 * @copyright EasyTransac
 */
class Security
{
	/**
	 * Returns the signature from a params list and api key for a request
	 * @param Array $params 		
	 * @param String $apiKey
	 * @return String
	 */
    public static function getSignature($params, $apiKey)
    {
    	if (is_object($params))
    		$params = (array) $params;
    	
        $signature = '';
        if (is_array($params))
        {
            ksort($params);
            foreach ($params as $name => $valeur)
            {
                if (strcasecmp($name, 'signature') != 0)
                {
                    if (is_array($valeur))
                    {
                        ksort($valeur);
                        foreach ($valeur as $v)
                            $signature .= $v.'$';
                    }
                    else
                        $signature .= $valeur.'$';
                }
            }
        }
        else
            $signature = $params.'$';

        $signature .= $apiKey;
        return sha1($signature);
    }
}

?>