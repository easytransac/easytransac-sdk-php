<?php
namespace EasyTransac\Converters;

/**
 * Convert boolean values to string values ('yes', 'no').
 */
class BooleanToString implements IConverter
{
    /**
     * Convert a boolean value to a string ('yes' or 'no').
     * If the value is not boolean, returns it as is.
     *
     * @param mixed $value The value to convert.
     * @return mixed 'yes'|'no' or original value.
     * @see \Easytransac\Converters\IConverter::convert()
     */
    public function convert($value)
    {
        if ($value === true) {
            return 'yes';
        } elseif ($value === false) {
            return 'no';
        }
        return $value;
    }
}
