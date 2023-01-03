<?php

namespace EasyTransac\Converters;

/**
 * Convert string values 'Yes'/'No' to lowercase 'yes'/'no'.
 */
class YesNoLowerCase implements IConverter
{
    /**
     * Convert 'Yes' to 'yes' and 'No' to 'no'.
     * Returns the original value if it does not match.
     *
     * @param mixed $value The value to convert.
     * @return mixed Converted value or original value.
     * @see \Easytransac\Converters\IConverter::convert()
     */
    public function convert($value)
    {
        if ($value === 'Yes') {
            return 'yes';
        } elseif ($value === 'No') {
            return 'no';
        }
        return $value;
    }
}
