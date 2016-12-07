<?php 

namespace EasyTransac\Core;

/**
 * Base methods for caller
 * @author klyde
 */
interface ICaller
{
	/**
	 * Defines the headers for calls
	 * @param array $params
	 */
	public function setHeaders(array $headers);
	
	/**
	 * Returns headers
	 * @return array
	 */
	public function getHeaders();
	
	/**
	 * Defines the timeout of the request
	 */
	public function setTimeout($second);
	
	/**
	 * Return true if this caller method is available
	 */
	public function isAvailable();
	
	/**
	 * Launch a call and return the result if there is no error
	 * @param String $url
	 * @param array $params
	 * @throw \RuntimeException
	 */
	public function call($url, array $params = array());
	
	/**
	 * Returns true is available
	 */
	public function isTLSv12Available();
	
	/**
	 * Add headers to the headers list
	 * @param array $headers
	 */
	public function addHeaders(array $headers);
}

?>