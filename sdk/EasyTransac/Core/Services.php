<?php

namespace EasyTransac\Core;

use \EasyTransac\Core\Security;

class Services
{
    public $debug = false;
    protected $key = null;
    protected $timeout = null;
    protected $curlInstance = null;
    private static $instance = null;

    public function setRequestTimeout($timeout)
    {
        $this->timeout = $timeout;
    }

    public function provideAPIKey($key)
    {
        $this->key = $key;
    }

    public function isDebug()
    {
        return $this->debug;
    }

    public function setDebug($debugMode)
    {
        $this->debug = $debugMode;
    }

    public function call($funcName, array $params)
    {
        if (empty($this->key))
            throw new \RuntimeException("API key not supplied");

        curl_setopt($this->curlInstance, CURLOPT_URL, 'https://www.easytransac.com/api'.$funcName);

        $params['Signature'] = Security::getSignature($params, $this->key);

        if ($this->isDebug())
            var_dump($params);

        if ($params)
            curl_setopt($this->curlInstance, CURLOPT_POSTFIELDS, http_build_query($params));

        // $response = curl_exec($this->curlInstance);
$response = '{
    "Code": 0,
    "Signature": "752c14ea195c460bac3c3b7896975ee9fd15eeb7",
    "Result": {
        "Id": "28861561",
        "Message": "User john@doe.com added"
    }
}';
        if (($errno = curl_errno($this->curlInstance)))
            throw new \RuntimeException("Curl trouble during the call, please check the error code with Curl documentation", $errno);

        return $response;
    }

    public static function getInstance()
    {
        if (self::$instance == null)
            self::$instance = new self();

        return self::$instance;
    }

    public function __destruct()
    {
        if ($this->curlInstance != null)
            curl_close($this->curlInstance);
    }

    private function __construct()
    {
        $this->initCurl();
    }

    private function __clone()
    {

    }

    protected function initCurl()
    {
        $this->curlInstance = curl_init();

        curl_setopt_array($this->curlInstance, array(
            CURLOPT_HTTPHEADER => array('EASYTRANSAC-API-KEY:'.$this->key),
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSLVERSION => CURL_SSLVERSION_TLSv1,
            CURLOPT_SSL_VERIFYHOST =>  false,
            CURLOPT_SSL_VERIFYPEER =>  false
        ));

        if ($this->timeout != null)
            curl_setopt($ch, CURLOPT_TIMEOUT, $this->timeout);
    }
}

?>