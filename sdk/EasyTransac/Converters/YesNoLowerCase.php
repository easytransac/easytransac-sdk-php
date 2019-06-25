<?php 

namespace EasyTransac\Converters;

/**
 * Change Value Yes/No to yes/no
 */
class YesNoLowerCase implements IConverter
{
	/**
	 * {@inheritDoc}
	 * @see \Easytransac\Converters\IConverter::convert()
	 */
	public function convert($value)
	{
		if ($value === 'Yes')
			return 'yes';
		else if ($value == 'No')
			return 'no';
		else 
			return $value;
	}
}

?>