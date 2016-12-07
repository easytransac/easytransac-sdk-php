<?php 

namespace EasyTransac\Core;

/**
 * Class for log data for debuging purpose
 * @author klyde
 */
class Logger
{
	protected $active = false;
	protected $logName = 'easytransac-sdk.txt';
	protected $filePath = '';
	protected static $instance;
	
	protected function __construct()
	{
		
	}
	
	protected function __clone()
	{
		
	}
	
	public static function getInstance()
	{
		if (self::$instance == null)
			self::$instance = new self();
		
		return self::$instance;
	}
	
	/**
	 * Defines if the logger is active
	 * @param Bool $active
	 * @return \EasyTransac\Core\Logger
	 */
	public function setActive($active)
	{
		$this->active = $active;
		return true;
	}
	
	/**
	 * Returns if the logger is active
	 * @return boolean
	 */
	public function isActive()
	{
		return $this->active;
	}
	
	/**
	 * Defines a log file path
	 * @param String $path
	 * @return \EasyTransac\Core\Logger
	 */
	public function setFilePath($path)
	{
		$this->filePath = $path;
		return $this;
	}
	
	/**
	 * Returns the log file path
	 * @return String
	 */
	public function getFilePath()
	{
		return $this->filePath;
	}
	
	/**
	 * Delete the log file
	 */
	public function delete()
	{
		if (file_exists($this->getFilePath().$this->logName))
			unlink($this->getFilePath().$this->logName);
	}
	
	/**
	 * Write the file log with the specified message
	 * @param Mixed $message
	 * @return void|\EasyTransac\Core\Logger
	 */
	public function write($message)
	{
		if (!$this->active)
			return;
		
		$date = date('Y-m-d H:i:s').' - ';
		
		if (is_array($message) || is_object($message))
			$message = print_r($message, true);
			
		file_put_contents($this->getFilePath().$this->logName, $date.$message.PHP_EOL.PHP_EOL, FILE_APPEND);
		
		return $this;
	}
}

?>