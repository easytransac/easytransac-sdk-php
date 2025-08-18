<?php

namespace EasyTransac\Core;

/**
 * Interface ICallerModifier
 *
 * Allows dynamic modification of HTTP calls performed through an ICaller
 * implementation, e.g., by changing the target method name or the parameters
 * sent with the request.
 *
 * @package EasyTransac\Core
 */
interface ICallerModifier
{
    /**
     * Applies modifications before the call is executed.
     *
     * @param mixed  $services  Instance of the service manager.
     * @param string $funcName  Name of the method to modify (or resolve).
     * @param array  $params    Initial call parameters.
     * @return void
     */
    public function execute($services, $funcName, $params);

    /**
     * Returns the modified method name or the full URL to call.
     *
     * @return string
     */
    public function getFuncName();

    /**
     * Returns the modified parameters to send with the call.
     *
     * @return array
     */
    public function getParams();
}
