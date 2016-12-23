<?php

namespace EasyTransac\Core;

/**
 * Specific modifier for ecommerce 
 * @author klyde
 */
class LimitedModifier implements ICallerModifier
{
	protected $funcName;
	protected $params;
	
	/**
	 * {@inheritDoc}
	 * @see \EasyTransac\Core\ICallerModifier::execute()
	 */
	public function execute(Services $services, $funcName, array $params) 
	{
		$this->funcName = $funcName;
		$this->params = $params;
		
		if (!in_array($funcName, ['/payment/oneclick', '/payment/listcards', '/payment/page']))
			throw new \RuntimeException('Request not allowed: '.$funcName); 
		
		if (!$services->getCaller()->isTLSv12Available())
		{
			$this->funcName = 'https://gateway.easytransac.com';
			
			if ($funcName == '/payment/oneclick')
				$services->getCaller()->addHeaders(['EASYTRANSAC-ONECLICK:1']);
			else if ($funcName == '/payment/listcards')
				$services->getCaller()->addHeaders(['EASYTRANSAC-LISTCARDS:1']);
		}
		else
			$this->funcName = 'https://www.easytransac.com/api'.$funcName;
	}

	/**
	 * {@inheritDoc}
	 * @see \EasyTransac\Core\ICallerModifier::getFuncName()
	 */
	public function getFuncName() 
	{
		return $this->funcName;
	}

	/**
	 * {@inheritDoc}
	 * @see \EasyTransac\Core\ICallerModifier::getParams()
	 */
	public function getParams() 
	{
		return $this->params;
	}
}

?>