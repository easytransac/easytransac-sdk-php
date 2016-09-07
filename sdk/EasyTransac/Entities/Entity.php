<?php

namespace EasyTransac\Entities;

use \EasyTransac\Core\CommentParser;
use \EasyTransac\Core\Services;

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
     */
    public function hydrate($fields)
    {
        if (is_array($fields))
            $this->hydrateWithArray($fields);
        else if(is_object($fields))
            $this->hydrateWidthObject($fields);

        if (Services::getInstance()->isDebug())
            var_dump($this->toArray());
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
                if ($out[$value['name']] == 'yes')
                    $out[$value['name']] = true;
                else if ($out[$value['name']] == 'no')
                    $out[$value['name']] = false;
            }
            else if ($value['type'] == 'object')
                $out += $this->{$key}->toArray();
            else if ($value['type'] == 'array')
            {
                $list = array();
                foreach ($this->{$key} as $c)
                    $list[] = $c->toArray();
                $out[$value['name']] = $list;
            }
        }

        return $out;
    }
    
    /**
     * Fill the entity with an list of entity (see: CreditCardList with comment tag @array)
     * @param Array<Entity> $itemsList
     */
    protected function hydrateWithArray($itemsList)
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
     */
    protected function hydrateWidthObject($fields)
    {
        foreach ($this->mapping as $key => $value)
        {
            if ($value['type'] == 'map' && isset($fields->{$value['name']}))
            {
                $this->{$key} = $fields->{$value['name']};
                if ($this->{$key} == 'yes')
                    $this->{$key} = true;
                if ($this->{$key} == 'no')
                    $this->{$key} = false;
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