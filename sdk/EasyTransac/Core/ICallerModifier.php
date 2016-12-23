<?php 

namespace EasyTransac\Core;

/**
 * Modifies the comportement of the caller
 * @author klyde
 */
interface ICallerModifier
{
	/**
	 * Ask for modifications
	 * @param Services $services
	 * @param String $funcName
	 * @param array $params
	 */
	public function execute(Services $services, $funcName, array $params);
	
	/**
	 * Returns the service name or its complete url
	 * @return String 
	 */
	public function getFuncName();
	
	/**
	 * Returns params
	 * @return array
	 */
	public function getParams();
}

?>