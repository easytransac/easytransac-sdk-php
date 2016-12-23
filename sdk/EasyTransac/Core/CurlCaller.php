<?php 

namespace EasyTransac\Core;

/**
 * Caller using Curl
 * @author klyde
 */
class CurlCaller implements ICaller
{
	protected $curlInstance = null;
	protected $timeout = null;
	protected $headers = array();

	public function __construct()
	{
		
	}
	
	public function __destruct()
	{
		if ($this->curlInstance != null)
			curl_close($this->curlInstance);
	}

	/**
	 * {@inheritDoc}
	 * @see \EasyTransac\Core\ICaller::setHeaders()
	 */
	public function setHeaders(array $headers) 
	{
		$this->headers = $headers;	
	}
	
	/**
	 * {@inheritDoc}
	 * @see \EasyTransac\Core\ICaller::getHeaders()
	 */
	public function getHeaders()
	{
		return $this->headers;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \EasyTransac\Core\ICaller::setTimeout()
	 */
	public function setTimeout($second)
	{
		$this->timeout = $second;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \EasyTransac\Core\ICaller::isAvailable()
	 */
	public function isAvailable()
	{
		return function_exists('curl_init');
	}

	/**
	 * {@inheritDoc}
	 * @see \EasyTransac\Core\ICaller::call()
	 */
	public function call($url, array $params = array()) 
	{
		if ($this->curlInstance == null)
			$this->initCurl();
		
		if ($this->headers)
			curl_setopt($this->curlInstance, CURLOPT_HTTPHEADER, $this->headers);
			
		if ($this->timeout != null)
		{
			curl_setopt($this->curlInstance, CURLOPT_TIMEOUT, $this->timeout);
			curl_setopt($this->curlInstance, CURLOPT_CONNECTTIMEOUT, $this->timeout);
		}
			
		curl_setopt($this->curlInstance, CURLOPT_URL, $url);
		
        if ($params)
            curl_setopt($this->curlInstance, CURLOPT_POSTFIELDS, http_build_query($params));
        
        $response = curl_exec($this->curlInstance);
        
        if (($errno = curl_errno($this->curlInstance)))
        	throw new \RuntimeException("Curl trouble during the call, please check the error code with Curl documentation", $errno);
        
        return $response;
	}

	/**
	 * Init the curl caller with options we need to contact safely the EasyTransac API
	 */
	protected function initCurl()
	{
		$this->curlInstance = curl_init();
	
		curl_setopt_array($this->curlInstance, array(
			CURLOPT_POST => true,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_SSL_VERIFYHOST =>  false,
			CURLOPT_SSL_VERIFYPEER =>  false
		));
	}
	/**
	 * {@inheritDoc}
	 * @see \EasyTransac\Core\ICaller::isTLS12()
	 */
	public function isTLSv12Available() 
	{
		return defined('CURL_SSLVERSION_TLSv1_2');
	}
	/**
	 * {@inheritDoc}
	 * @see \EasyTransac\Core\ICaller::addHeaders()
	 */
	public function addHeaders(array $headers) 
	{
		$this->headers = array_merge($this->headers, $headers);
	}

}

?>