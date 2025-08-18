<?php
namespace EasyTransac\Core;

/**
 * Class CommentParser
 *
 * Parses DocBlock comments of a given class's protected properties
 * to extract metadata tags.
 *
 * Supported tags:
 *   @map:FieldName
 *   @object:FieldName
 *   @array:FieldName
 *
 * Used notably for auto-mapping in the EasyTransac API.
 *
 * @author EasyTransac
 */
class CommentParser
{
    /**
     * Fully-qualified class name to inspect.
     * @var string
     */
    protected $class;

    /**
     * Constructor.
     *
     * @param string $class Fully-qualified class name (with namespace) to analyze.
     */
    public function __construct($class)
    {
        $this->class = $class;
    }

    /**
     * Parses the class's protected properties and extracts supported tags
     * found in their DocBlock comments.
     *
     * @return \Generator Yields associative arrays in the form:
     *                    ['field' => propertyName, 'name' => tagName, 'type' => tagType]
     */
    public function parse(): \Generator
    {
        $r = new \ReflectionClass($this->class);

        // Retrieve all protected properties
        $props = $r->getProperties(\ReflectionProperty::IS_PROTECTED);

        // 2025-07-22 [FIX] (Mirana) Adjust this part of parse() to ignore properties without PHPDoc comments
        foreach ($props as $prop) {
            // Get the property's DocBlock comment
            $value = $r->getProperty($prop->getName())->getDocComment();

            // ✅ Avoid errors when there is no comment
            if ($value === false) {
                continue;
            }

            // Look for a specific tag in the form @type:Name
            preg_match('#@(map|object|array):([_a-zA-Z0-9]+)#', $value, $matches);

            if (!$matches || count($matches) !== 3) {
                continue;
            }

            yield [
                'field' => $prop->getName(),
                'name'  => $matches[2],
                'type'  => $matches[1]
            ];
        }
    }
}
