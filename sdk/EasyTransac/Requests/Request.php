<?php

namespace EasyTransac\Requests;

use \EasyTransac\Core\Services;
use \EasyTransac\Entities\Entity;
use \EasyTransac\Responses\StandardResponse;
use \EasyTransac\Core\CommentParser;
use EasyTransac\Core\Security;

/**
 * Gerenic request
 * @author Klyde
 * @copyright EasyTransac
 */
abstract class Request
{
	protected $requiredFields = []; 
	
	/**
	 * Calls the API function
	 * @param Entity $entity
	 * @return \EasyTransac\Responses\StandardResponse
	 */
	abstract public function execute(Entity $entity);
	
	/**
	 * Call a EasyTransac API function
	 * @param String $funcName
	 * @param Entity $entity
	 */
    protected function call($funcName, Entity $entity)
    {
        try
        {
        	$params = $entity->toArray();
            $response = Services::getInstance()->call($funcName, $params);
	        $json = json_decode($response);
        
	        if (!$json)
	        {
	        	return (new StandardResponse())
	        		->setErrorMessage('Unable to json decode, response is malformed or empty');
	        }
	         
	        if ($json->Code != '0')
	        {
	        	return (new StandardResponse())
		        	->setErrorMessage($json->Error)
		        	->setErrorCode($json->Code);
	        }
	        else
	        {
	        	$sameSignature = property_exists($json, 'Signature')
	        		&& $json->Signature == Security::getSignature($json->Result, \EasyTransac\Core\Services::getInstance()->getAPIKey());
	        	 
	        	if (!$sameSignature)
	        	{
	        		\EasyTransac\Core\Logger::getInstance()->write('Signature diff failed');
	        		\EasyTransac\Core\Logger::getInstance()->write('Response: ');
	        		\EasyTransac\Core\Logger::getInstance()->write($json);
	        		\EasyTransac\Core\Logger::getInstance()->write('Used api key: '.\EasyTransac\Core\Services::getInstance()->getAPIKey());
	        		
	        		return (new StandardResponse())
	        			->setErrorMessage('The signature is incorrect');
	        	}
	        	 
	        	if (!$this->checkRequiredFields($json->Result))
	        	{
	        		return (new StandardResponse())
	        			->setErrorMessage('One or more required fields in the response are missing');
	        	}
	        	 
	        	return $this->mapResponse($json->Result);
	        }
        }
        catch (\Exception $e)
        {
        	return (new StandardResponse())->setErrorMessage($e->getMessage());
        }
    }
    
    /**
     * Makes the relation between API field names and entity attributes and hydrates the correct entity
     * @param \stdClass $fields
     * @return \EasyTransac\Responses\StandardResponse
     */
    protected function mapResponse($fields)
    {
        $sr = new StandardResponse();
        $sr->setSuccess(true);

        $parser = new CommentParser($this);

        $entity = null;
        foreach ($parser->parse() as $result)
        {
            if ($result['type'] == 'object')
            {
                $className = '\\EasyTransac\\Entities\\'.$result['name'];
                $entity = new $className();
                $entity->hydrate($fields, true);
                break;
            }
        }

        $sr->setContent($entity);

        return $sr;
    }
    
    /**
     * Returns true if all required fields are in the json response
     * @param Array|stdClass $json
     * @return boolean
     */
    private function checkRequiredFields($json)
    {
    	foreach ($this->requiredFields as $field)
    	{
    		if ((is_string($field) && is_object($json) && !property_exists($json, $field)) || 
    			(!is_string($field) && (!$this->checkRequiredFields($field))))
    		{
    			return false;
    		}
    	}
    	 
    	return true;
    }
}

?>