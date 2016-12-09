<?php 

namespace EasyTransac\Core;

/**
 * Caller using file_get_contents
 * @author klyde
 */
class FgcCaller implements ICaller
{
	protected $timeout = null;
	protected $headers = array();

	public function __construct()
	{
		;
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
		return function_exists('file_get_contents');
	}

	/**
	 * {@inheritDoc}
	 * @see \EasyTransac\Core\ICaller::call()
	 */
	public function call($url, array $params = array()) 
	{
		$opts = array(
			'http' => array(
				'method' => 'POST',
			)
		);
		
		if ($this->headers)
		{
			$h = $this->headers;
			$h[] = 'Content-type: application/x-www-form-urlencoded';
			$opts['http']['header'] = implode(PHP_EOL, $h);
		}
		
		if ($params)
			$opts['http']['content'] = http_build_query($params);
		
		if ($this->timeout != null)
			$opts['http']['timeout'] = $this->timeout;
		
		$response = file_get_contents($url, false, stream_context_create($opts));
		
		if (!$response)
			throw new \RuntimeException('The request has failed');
		
		return $response;
	}
	/**
	 * {@inheritDoc}
	 * @see \EasyTransac\Core\ICaller::isTLS12()
	 */
	public function isTLSv12Available() 
	{
		return false;
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