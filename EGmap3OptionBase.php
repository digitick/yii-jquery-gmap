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
 * Base class for all options.
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
		$thisClass = get_class($this);
		
 		foreach ($this->getOptionChecks() as $property => $allowed) {
			$propertyValue = $this->$property;
			if ($propertyValue === null) {
				continue;
			}
			// array of allowed values
			if (is_array($allowed)) {
				if (!in_array($propertyValue, $allowed)) {
					throw new CException("'Invalid value given for '{$thisClass}.{$property}' : '{$propertyValue}'.");
				}
			}
			// allowed class
			else if (is_string($allowed) && strpos($allowed, 'class') !== false) {
				// class name different from property name
				if (strpos($allowed, 'class:') !== false) {
					$className = substr($allowed, 6);
				}
				// class name same as property name
				else {
					$className = 'EGmap3' . ucfirst($property);
				}
				$this->$property = $this->verifyClassType($thisClass, $property, $className, $propertyValue);
				$this->$property->verifyOptions();
			}
			/*TODO*/
			// array of a given class
			else if (is_string($allowed) && strpos($allowed, 'arrayOfClass:') !== false) {
				$className = substr($allowed, 13);
				// basic sanity check
				if (!is_array($propertyValue)) {
					throw new CException("The value of '{$thisClass}.{$property}' must be an array containg objects of class : '{$className}'.");
				}				
				// verify each sub-object
				foreach ($propertyValue as $prop => $val) {
					$object = $this->verifyClassType($thisClass, $prop, $className, $val);
					if ($object->verifyOptions()) {
						$propertyValue[$prop] = $object;
					}
				}
			}
			// must be an array
			else if (is_string($allowed) && strpos($allowed, 'array') !== false) {
				if (!is_array($propertyValue)) {
					throw new CException("The value of '{$thisClass}.{$property}' must be an array.");
				}
			}
		}
		return true;
	}

	/**
	 * Check that a given value is an object of a given type.
	 * If the value is an array, attempt to create an object of the array values.
	 * 
	 * @param string $property Object property
	 * @param string $className Name of class to verify or instanciate
	 * @param mixed $propertyValue Value to check
	 * @return EGmap3OptionBase 
	 */
	protected function verifyClassType($thisClass, $property, $className, $propertyValue)
	{		
		// array given, convert to object
		if (is_array($propertyValue)) {
			$object = new $className();
			foreach ($propertyValue as $k => $v) {
				$object->$k = $v;
			}
			return $object;
		}
		// object given, check type
		else if (is_object($propertyValue)) {
			if (get_class($propertyValue) !== $className) {
				throw new CException("Invalid object type given for '{$thisClass}.{$property}' : " . get_class($propertyValue));
			}
			return $propertyValue;
		}
		else {
			throw new CException("The value of '{$thisClass}.{$property}' must be an object or an array.");
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