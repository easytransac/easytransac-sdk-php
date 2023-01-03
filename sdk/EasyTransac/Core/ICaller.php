<?php

namespace EasyTransac\Core;

/**
 * Interface ICaller
 *
 * Defines a standard for HTTP call mechanisms (like cURL or file_get_contents)
 * used to communicate with the EasyTransac API.
 *
 * @package EasyTransac\Core
 */
interface ICaller
{
    /**
     * Defines the headers for HTTP calls.
     *
     * @param $headers Associative array of HTTP headers.
     * @return void
     */
    public function setHeaders($headers);

    /**
     * Returns the currently set headers.
     *
     * @return array The HTTP headers.
     */
    public function getHeaders();

    /**
     * Defines the timeout in seconds for the HTTP call.
     *
     * @param $second Timeout duration in seconds.
     * @return void
     */
    public function setTimeout($second);

    /**
     * Returns true if the underlying method (cURL, file_get_contents, etc.) is available.
     *
     * @return bool
     */
    public function isAvailable();

    /**
     * Executes an HTTP call to the provided URL with optional parameters.
     *
     * @param $url The endpoint URL.
     * @param $params Optional parameters for POST requests.
     * @return string The raw response body.
     * @throws \RuntimeException On network or HTTP failure.
     */
    public function call($url, $params = []);

    /**
     * Checks if the HTTP client supports TLS v1.2.
     *
     * @return bool
     */
    public function isTLSv12Available();

    /**
     * Adds additional HTTP headers to the request.
     *
     * @param $headers Headers to merge with the current list.
     * @return void
     */
    public function addHeaders($headers);
}
