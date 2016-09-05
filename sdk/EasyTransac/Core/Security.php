<?php

namespace EasyTransac\Core;

class Security
{
    public static function getSignature($params, $apiKey)
    {
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