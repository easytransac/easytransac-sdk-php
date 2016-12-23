<?php

namespace EasyTransac\Core;

use \EasyTransac\Core\Security;

/**
 * Singleton, allows to call EasyTransac API with API key
 * @author Klyde
 * @copyright EasyTransac
 */
class Services
{
    private static $instance = null;
    private $key = null;
    private $caller = null;
    private $modifier;
    private $url = 'https://www.easytransac.com/api';
    private $timeout = 10;

    /**
     * Add a modifier for the caller
     * @param ICallerModifier $modifier
     * @return \EasyTransac\Core\Services
     */
    public function setModifier(ICallerModifier $modifier)
    {
    	$this->modifier = $modifier;
    	return $this;
    }
    
    /**
     * Returns the current modifier
     * @return \EasyTransac\Core\ICallerModifier
     */
    public function getModifier()
    {
    	return $this->modifier;
    }
    
    /**
     * Defines the caller
     * @param ICaller $caller
     * @return \EasyTransac\Core\Services
     */
    public function setCaller(ICaller $caller)
    {
    	$this->caller = $caller;
    	return $this;
    }
    
    /**
     * Remove the current Modifier
     * @return \EasyTransac\Core\Services
     */
    public function removeModifier()
    {
    	$this->modifier = null;
    	return $this;
    }

    /**
     * Remove the current caller
     * @return \EasyTransac\Core\Services
     */
    public function removeCaller()
    {
    	$this->caller = null;
    	return $this;
    }
    
    /**
     * Get the caller
     * @return \EasyTransac\Core\ICaller
     */
    public function getCaller()
    {
    	return $this->caller;
    }
    
    /**
     * Set the url for the request
     * @param String $url
     * @return \EasyTransac\Core\Services
     */
    public function setUrl($url)
    {
    	$this->url = $url;
    	return $this;
    }
    
    /**
     * Defines the time out of the request
     * @param int $timeout
     * @return \EasyTransac\Core\Services
     */
    public function setRequestTimeout($timeout)
    {
        $this->timeout = $timeout;
        return $this;
    }

    /**
     * Defines the API key
     * @param String $key
     * @return \EasyTransac\Core\Services
     */
    public function provideAPIKey($key)
    {
        $this->key = $key;
        
        return $this;
    }
    
    /**
     * Returns the api key provided
     * @return String
     */
    public function getAPIKey()
    {
    	return $this->key;
    }

    /**
     * Returns if debug mode is active
     * @return Boolean
     */
    public function isDebug()
    {
        return Logger::getInstance()->isActive();
    }

    /**
     * Defines the debug mode
     * @param Boolean $debugMode
     * @return \EasyTransac\Core\Services
     */
    public function setDebug($debugMode)
    {
        Logger::getInstance()->setActive($debugMode);
        return $this;
    }

    /**
     * Calls the specified EasyTransac function 
     * @param String $funcName
     * @param array &$params
     * @return String
     * @throws \RuntimeException
     */
    public function call($funcName, array &$params)
    {
        if (empty($this->key))
            throw new \RuntimeException("API key not supplied");

        if (empty($this->caller))
            throw new \RuntimeException("Caller not supplied");
            
        $this->caller->setTimeout($this->timeout);
        $this->caller->setHeaders(array('EASYTRANSAC-API-KEY:'.$this->key));
        
        if (!empty($this->modifier))
        {
        	try 
        	{
        		$this->modifier->execute($this, $funcName, $params);
	        	$target = $this->modifier->getFuncName();
	        	$params = $this->modifier->getParams();
        	}
        	catch (\RuntimeException $e)
        	{
        		Logger::getInstance()->write('Exception: '.$e->getMessage());
        		throw $e;
        	}
        }
        else
        	$target = $this->url.$funcName;
        
        $params['Signature'] = Security::getSignature($params, $this->key);
        
        Logger::getInstance()->write('Called url: '.$target);
        Logger::getInstance()->write($params);

		try 
		{
			$response = $this->caller->call($target, $params);
			Logger::getInstance()->write($response);
			return $response;
		}
		catch (\Exception $e)
		{
			Logger::getInstance()->write('Exception: '.$e->getMessage().', Code: '.$e->getCode());
			throw $e;
		}
    }

    /**
     * Returns the single instance of the Services class
     * @return \EasyTransac\Core\Services
     */
    public static function getInstance()
    {
        if (self::$instance == null)
            self::$instance = new self();

        return self::$instance;
    }

    /**
     * Destruct, kill the caller
     */
    public function __destruct()
    {
    	$this->caller = null;
    }

    /**
     * Init the base caller
     */
    private function __construct()
    {
    	$this->caller = new CurlCaller();
    	
    	if (!$this->caller->isAvailable())
    		$this->caller = new FgcCaller();
    }

    /**
     * Clone not available for this singleton
     */
    private function __clone()
    {

    }
}

?>