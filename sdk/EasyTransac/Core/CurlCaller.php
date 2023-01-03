<?php

namespace EasyTransac\Core;

/**
 * Makes HTTP requests using cURL to interact with the EasyTransac API.
 * Implements ICaller.
 *
 * @package EasyTransac\Core
 */
class CurlCaller implements ICaller
{
    /** @var resource|\CurlHandle|null cURL handle */
    protected $curlInstance = null;

    /** @var int|null Timeout in seconds */
    protected $timeout = null;

    /** @var array HTTP headers */
    protected $headers = [];

    public function __construct()
    {
        // No initialization needed
    }

    public function __destruct()
    {
        if ($this->curlInstance !== null) {
            curl_close($this->curlInstance);
        }
    }

    /**
     * Sets custom headers for the HTTP request.
     *
     * @param $headers
     * @return void
     */
    public function setHeaders($headers)
    {
        $this->headers = $headers;
    }

    /**
     * Gets the current list of headers.
     *
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * Sets the cURL timeout.
     *
     * @param $second Timeout in seconds
     * @return void
     */
    public function setTimeout($second)
    {
        $this->timeout = $second;
    }

    /**
     * Checks if cURL is available on the server.
     *
     * @return bool
     */
    public function isAvailable()
    {
        return function_exists('curl_init');
    }

    /**
     * Executes the HTTP call via cURL.
     *
     * @param $url
     * @param $params
     * @return string
     * @throws \RuntimeException On cURL error
     */
    public function call($url, $params = [])
    {
        if ($this->curlInstance === null) {
            $this->initCurl();
        }

        if (!empty($this->headers)) {
            curl_setopt($this->curlInstance, CURLOPT_HTTPHEADER, $this->headers);
        }

        if ($this->timeout !== null) {
            curl_setopt($this->curlInstance, CURLOPT_TIMEOUT, $this->timeout);
            curl_setopt($this->curlInstance, CURLOPT_CONNECTTIMEOUT, $this->timeout);
        }

        curl_setopt($this->curlInstance, CURLOPT_URL, $url);

        if (!empty($params)) {
            curl_setopt($this->curlInstance, CURLOPT_POSTFIELDS, http_build_query($params));
        }

        $response = curl_exec($this->curlInstance);

        if (($errno = curl_errno($this->curlInstance))) {
            throw new \RuntimeException(
                'Curl error during request: ' . curl_error($this->curlInstance),
                $errno
            );
        }

        return (string) $response;
    }

    /**
     * Initializes cURL with default options for EasyTransac API.
     *
     * @return void
     */
    protected function initCurl()
    {
        $this->curlInstance = curl_init();

        curl_setopt_array($this->curlInstance, [
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
        ]);
    }

    /**
     * Checks if TLS v1.2 is supported by the cURL build.
     *
     * @return bool
     */
    public function isTLSv12Available()
    {
        return defined('CURL_SSLVERSION_TLSv1_2');
    }

    /**
     * Adds additional headers to the current header set.
     *
     * @param $headers
     * @return void
     */
    public function addHeaders($headers)
    {
        $this->headers = array_merge($this->headers, $headers);
    }
}
