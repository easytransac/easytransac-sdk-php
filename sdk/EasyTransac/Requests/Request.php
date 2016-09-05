<?php

namespace EasyTransac\Requests;

use \EasyTransac\Core\Services;
use \EasyTransac\Entities\Entity;
use \EasyTransac\Responses\StandardResponse;
use \EasyTransac\Core\CommentParser;

abstract class Request
{
    protected function call($funcName, Entity $entity)
    {
        try
        {
            $response = Services::getInstance()->call($funcName, $entity->toArray());

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
                return $this->mapResponse($json->Result);
        }
        catch (Exception $e)
        {
            return (new StandardResponse())->setErrorMessage($e->getMessage());
        }
    }

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
                $entity->hydrate($fields);
                break;
            }
        }

        $sr->setContent($entity);

        return $sr;
    }
}

?>