<?php

namespace EasyTransac\Core;

/**
 * Makes HTTP requests using file_get_contents.
 * Fallback implementation of ICaller when cURL is unavailable.
 *
 * @package EasyTransac\Core
 */
class FgcCaller implements ICaller
{
    /** @var int|null Timeout in seconds */
    protected $timeout = null;

    /** @var array HTTP headers */
    protected $headers = [];

    public function __construct()
    {
        // No initialization needed
    }

    /**
     * Sets custom HTTP headers.
     *
     * @param $headers
     */
    public function setHeaders($headers)
    {
        $this->headers = $headers;
    }

    /**
     * Retrieves the current HTTP headers.
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * Sets the timeout duration for HTTP requests.
     *
     * @param $second
     */
    public function setTimeout($second)
    {
        $this->timeout = $second;
    }

    /**
     * Checks if file_get_contents is available for HTTP requests.
     */
    public function isAvailable()
    {
        return function_exists('file_get_contents');
    }

    /**
     * Executes an HTTP POST request using file_get_contents.
     *
     * @param $url
     * @param $params
     * @return string
     * @throws \RuntimeException if the request fails
     */
    public function call($url, $params = [])
    {
        $opts = [
            'http' => [
                'method' => 'POST',
            ],
        ];

        // Add headers
        if (!empty($this->headers)) {
            $headers = $this->headers;
            $headers[] = 'Content-type: application/x-www-form-urlencoded';
            $opts['http']['header'] = implode(PHP_EOL, $headers);
        }

        // Add POST data
        if (!empty($params)) {
            $opts['http']['content'] = http_build_query($params);
        }

        // Set timeout if specified
        if ($this->timeout !== null) {
            $opts['http']['timeout'] = $this->timeout;
        }

        $response = @file_get_contents($url, false, stream_context_create($opts));

        if ($response === false) {
            throw new \RuntimeException('The request has failed');
        }

        return $response;
    }

    /**
     * This method always returns false as file_get_contents does not provide TLS version information.
     */
    public function isTLSv12Available()
    {
        return false;
    }

    /**
     * Adds additional headers to the current header list.
     *
     * @param $headers
     */
    public function addHeaders($headers)
    {
        $this->headers = array_merge($this->headers, $headers);
    }
}
