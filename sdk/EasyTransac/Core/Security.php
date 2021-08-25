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
	    $params = array_change_key_case($params, CASE_LOWER);
            ksort($params);

            foreach ($params as $name => $valeur)
            {
            	if (is_object($valeur))
            		$valeur = (array) $valeur;
            	
                if (strcasecmp($name, 'signature') != 0)
                {
                    if (is_array($valeur))
                    {
                        $valeur = array_change_key_case($valeur, CASE_LOWER);
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
