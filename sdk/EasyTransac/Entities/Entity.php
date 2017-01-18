<?php

namespace EasyTransac\Entities;

use \EasyTransac\Core\CommentParser;
use \EasyTransac\Core\Services;
use EasyTransac\Core\Logger;

/**
 * Generic entity
 * @author Klyde
 * @copyright EasyTransac
 */
abstract class Entity
{
    protected $mapping = array();

    public function __construct()
    {
        $this->makeMapping();
    }

    /**
     * Allows to fill the entity with data returned by the EasyTransac API
     * @param Mixed $fields Array or \stdClass
     * @param Boolean $checkRequired
     * @return \EasyTransac\Entities\Entity
     */
    public function hydrate($fields, $checkRequired = false)
    {
        if (is_array($fields))
            $this->hydrateWithArray($fields, $checkRequired);
        else if(is_object($fields))
            $this->hydrateWidthObject($fields, $checkRequired);

        Logger::getInstance()->write($this->toArray());
        
        return $this;
    }

    /**
     * Prepares an array with the class fields formatted for the API
     * @return Array
     */
    public function toArray()
    {
        $out = array();
        foreach ($this->mapping as $key => $value)
        {
            if ($this->{$key} === null)
                continue;

            if ($value['type'] == 'map')
            {
                $out[$value['name']] = $this->{$key};
            }
            else if ($value['type'] == 'array')
            {
                $list = array();
                foreach ($this->{$key} as $c)
                    $list[] = $c->toArray();
                $out[$value['name']] = $list;
            }
            else if ($value['type'] == 'object')
                $out += $this->{$key}->toArray();
        }

        return $out;
    }
    
    /**
     * Fill the entity with an list of entity (see: CreditCardList with comment tag @array)
     * @param Array<Entity> $itemsList
     * @param Boolean $checkRequired
     */
    protected function hydrateWithArray($itemsList, $checkRequired = false)
    {
        $field = null;
        foreach ($this->mapping as $key => $value)
            if ($value['type'] == 'array')
                $field = $value;
    
        if ($field == null)
            return;
    
        $list = array();
        foreach ($itemsList as $item)
        {
            $className = '\\EasyTransac\\Entities\\'.$field['name'];
            $e = new $className();
            $e->hydrate($item);
            $list[] = $e;
        }
        $this->{$field['field']} = $list;
    }
    
    /**
     * Fill the entity with the API json response
     * @param \stdClass $fields
     * @param Boolean $checkRequired
     */
    protected function hydrateWidthObject($fields, $checkRequired = false)
    {
        foreach ($this->mapping as $key => $value)
        {
            if ($value['type'] == 'map' && property_exists($fields, $value['name']))
            {
                $this->{$key} = $fields->{$value['name']};
            }
            else if($value['type'] == 'object' && property_exists($fields, $value['name']))
            {
            	$className = '\\EasyTransac\\Entities\\'.$value['name'];
            	$e = new $className();
            	$e->hydrate($fields->{$value['name']});
            	$this->{$key} = $e;
            }
        }
    }

    /**
     * Make the mapping between class attributes and API fields
     */
    private function makeMapping()
    {
        $parser = new CommentParser($this);

        foreach ($parser->parse() as $result)
            $this->mapping[$result['field']] = $result;
    }
}

?>