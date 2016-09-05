<?php

namespace EasyTransac\Core;

class CommentParser
{
    protected $class = null;

    public function __construct($class)
    {
        $this->class = $class;
    }

    public function parse()
    {
        $r = new \ReflectionClass($this->class);
        $props = $r->getProperties(\ReflectionProperty::IS_PROTECTED);

        foreach($props as $prop)
        {
            $value = $r->getProperty($prop->getName())->getDocComment();
            preg_match('#@(map|object|array):([_a-zA-Z0-9]+)#', $value, $matches);

            if (!$matches || count($matches) != 3)
                continue;

            yield array('field' => $prop->getName(), 'name' => $matches[2], 'type' => $matches[1]);
        }
    }
}

?>