<?php

namespace EasyTransac\Converters;

/**
 * Interface IConverter
 *
 * Declares a method to convert a value from one representation to another.
 * This interface acts as a contract for any concrete converter class.
 */
interface IConverter
{
    /**
     * Converts a given value to another representation.
     *
     * The exact input and output types may vary depending on the conversion
     * logic implemented by the concrete class.
     *
     * @param mixed $value Value to convert (type may vary).
     * @return mixed Converted value (type may vary).
     */
    public function convert($value);
}
