<?php

/**
 * EGmap3 Yii extension
 *
 * Object oriented PHP interface to GMAP3 Javascript library for
 * Google Maps.
 *
 * @copyright © Digitick <www.digitick.net> 2011
 * @license GNU Lesser General Public License v3.0
 * @author Ianaré Sévi
 *
 */

/**
 * Base calss for all options.
 */
abstract class EGmap3OptionBase extends EGmap3ObjectBase
{
	/**
	 * Get the option validation information. Must be overriden by the child
	 * class if there are checks to run.
	 * @return array
	 */
	public function getOptionChecks()
	{
		return array();
	}

	/**
	 * Go through the options passed to the object and make sure they are valid.
	 */
	public function verifyOptions()
	{
		foreach ($this->getOptionChecks() as $property => $allowed) {
			$propertyValue = $this->$property;
			if ($propertyValue === null) {
				continue;
			}
			// array of allowed values
			if (is_array($allowed)) {
				if (!in_array($propertyValue, $allowed)) {
					throw new CException('Invalid option given for ' . $property . ' : ' . $propertyValue);
				}
			}
			// allowed class
			else if (is_string($allowed) && $allowed === 'class') {
				$className = 'EGmap3' . ucfirst($property);
				// array given, convert to object
				if (is_array($propertyValue)) {
					$object = new $className();
					foreach ($propertyValue as $k => $v) {
						$object->$k = $v;
					}
					$this->$property = $object;
				}
				// object given, check type
				else if (is_object($propertyValue)) {
					if (get_class($propertyValue) !== $className){
						throw new CException('Invalid object type given for ' . $property . ' : ' . get_class($propertyValue));
					}
				}
				else {
					throw new CException('The property : ' . $property . ' must be an object or an array.');
				}
				$this->$property->verifyOptions();
			}
		}
	}

	/**
	 * Determine if any options are set.
	 * @return boolean
	 */
	public function isEmpty()
	{
		foreach (get_object_vars($this) as $var) {
			if ($var !== null) {
				return false;
			}
		}
		return true;
	}
}