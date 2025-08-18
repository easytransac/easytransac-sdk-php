<?php
namespace EasyTransac\Core;

use EasyTransac\Core\Security;

/**
 * Singleton used to call the EasyTransac API with an API key.
 *
 * This class manages request configuration, the chosen caller,
 * an optional modifier, and signature handling.
 *
 * Compatible with PHP 7 and 8 without logical changes.
 *
 * @copyright EasyTransac
 * @package EasyTransac\Core
 */
class Services
{
    /**
     * Singleton instance.
     * @var Services|null
     */
    private static $instance = null;

    /**
     * API key used for calls.
     * @var string|null
     */
    private $key = null;

    /**
     * HTTP caller object that performs requests.
     * @var ICaller|null
     */
    private $caller = null;

    /**
     * Optional modifier to change call behavior.
     * @var ICallerModifier|null
     */
    private $modifier = null;

    /** Environments */
    public const ENV_SANDBOX    = 'sandbox';
    public const ENV_PRODUCTION = 'production';

    /** Base URLs */
    public const URL_SANDBOX    = 'https://sandbox.easytransac.com/api';
    public const URL_PRODUCTION = 'https://www.easytransac.com/api';

    /** @var string Base URL (defaults to production) */
    private $url = self::URL_PRODUCTION;

    /**
     * Request timeout in seconds.
     * @var int
     */
    private $timeout = 10;

    /**
     * Sets the environment.
     *
     * @param string $env self::ENV_SANDBOX | self::ENV_PRODUCTION
     * @return $this
     * @throws \InvalidArgumentException
     */
    public function setEnvironment($env)
    {
        $env = strtolower((string) $env);

        if ($env === self::ENV_SANDBOX) {
            $this->url = self::URL_SANDBOX;
        } elseif ($env === self::ENV_PRODUCTION) {
            $this->url = self::URL_PRODUCTION;
        } else {
            throw new \InvalidArgumentException(sprintf(
                'Invalid environment: %s (expected: "%s" or "%s")',
                $env,
                self::ENV_SANDBOX,
                self::ENV_PRODUCTION
            ));
        }

        return $this;
    }

    /**
     * Sets a modifier to be applied to the caller.
     *
     * @param ICallerModifier $modifier Modifier to apply.
     * @return self
     */
    public function setModifier(ICallerModifier $modifier)
    {
        $this->modifier = $modifier;
        return $this;
    }

    /**
     * Returns the currently configured modifier.
     *
     * @return ICallerModifier|null
     */
    public function getModifier()
    {
        return $this->modifier;
    }

    /**
     * Sets the caller used for HTTP requests.
     *
     * @param ICaller $caller Instance implementing ICaller.
     * @return self
     */
    public function setCaller(ICaller $caller)
    {
        $this->caller = $caller;
        return $this;
    }

    /**
     * Removes the current modifier.
     *
     * @return self
     */
    public function removeModifier()
    {
        $this->modifier = null;
        return $this;
    }

    /**
     * Removes the current caller.
     *
     * @return self
     */
    public function removeCaller()
    {
        $this->caller = null;
        return $this;
    }

    /**
     * Returns the current caller.
     *
     * @return ICaller|null
     */
    public function getCaller()
    {
        return $this->caller;
    }

    /**
     * Sets the base URL for API requests.
     *
     * @param string $url Full or base URL.
     * @return self
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * Sets the request timeout (in seconds).
     *
     * @param int $timeout Max wait time in seconds.
     * @return self
     */
    public function setRequestTimeout($timeout)
    {
        $this->timeout = $timeout;
        return $this;
    }

    /**
     * Provides the API key to use for calls.
     *
     * @param string $key EasyTransac API key.
     * @return self
     */
    public function provideAPIKey($key)
    {
        $this->key = $key;
        return $this;
    }

    /**
     * Returns the configured API key.
     *
     * @return string|null
     */
    public function getAPIKey()
    {
        return $this->key;
    }

    /**
     * Checks whether debug mode is enabled via the Logger.
     *
     * @return bool
     */
    public function isDebug()
    {
        return Logger::getInstance()->isActive();
    }

    /**
     * Enables or disables debug mode.
     *
     * @param bool $debugMode True to enable, false otherwise.
     * @return self
     */
    public function setDebug($debugMode)
    {
        Logger::getInstance()->setActive($debugMode);
        return $this;
    }

    /**
     * Performs a call to the specified EasyTransac API function.
     *
     * @param string $funcName Function name to call.
     * @param array  $params   Parameters to send (by reference; may be modified by a modifier).
     * @return string Raw response returned by the HTTP call.
     *
     * @throws \RuntimeException If the API key or the caller is not supplied.
     * @throws \Exception For any other error during the call.
     */
    public function call($funcName, array &$params)
    {
        // Ensure the API key is provided
        if (empty($this->key)) {
            throw new \RuntimeException("API key not supplied");
        }

        // Ensure the caller is provided
        if (empty($this->caller)) {
            throw new \RuntimeException("Caller not supplied");
        }

        // Configure timeout and headers on the caller
        $this->caller->setTimeout($this->timeout);
        $this->caller->setHeaders(['EASYTRANSAC-API-KEY:' . $this->key]);

        // If a modifier is set, let it adjust the target and parameters
        if (!empty($this->modifier)) {
            try {
                $this->modifier->execute($this, $funcName, $params);
                $target = $this->modifier->getFuncName();
                $params = $this->modifier->getParams();
            } catch (\RuntimeException $e) {
                Logger::getInstance()->write('Exception: ' . $e->getMessage());
                throw $e;
            }
        } else {
            // Otherwise, target is base URL + function name
            $target = $this->url . $funcName;
        }

        // Add a Version parameter if missing
        if (!isset($params['Version'])) {
            $params['Version'] = 'easytransac-sdk-php';
        }

        // Generate and add the security signature
        $params['Signature'] = Security::getSignature($params, $this->key);

        // Log the called URL and parameters
        Logger::getInstance()->write('Called url: ' . $target);
        Logger::getInstance()->write($params);

        try {
            // Perform the HTTP call through the caller
            $response = $this->caller->call($target, $params);

            // Log the raw response
            Logger::getInstance()->write($response);

            return $response;
        } catch (\Exception $e) {
            // Log and rethrow on error
            Logger::getInstance()->write('Exception: ' . $e->getMessage() . ', Code: ' . $e->getCode());
            throw $e;
        }
    }

    /**
     * Returns the singleton instance of the Services class.
     *
     * @return self
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Destructor: releases the caller reference.
     */
    public function __destruct()
    {
        $this->caller = null;
    }

    /**
     * Private constructor for the singleton.
     * Initializes a default caller, preferring CurlCaller if available,
     * otherwise falling back to FgcCaller.
     */
    private function __construct()
    {
        $this->caller = new CurlCaller();

        if (!$this->caller->isAvailable()) {
            $this->caller = new FgcCaller();
        }
    }

    /**
     * Cloning is not available for this singleton.
     */
    private function __clone()
    {
    }
}
