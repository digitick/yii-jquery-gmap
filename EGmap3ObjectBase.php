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
 * Base for all gmap3 classes
 */
class EGmap3ObjectBase
{

	/**
	 * Convert object hierchqrchy to string.
	 * @return string
	 */
	public function toJS()
	{
		$vars = get_object_vars($this);
		$encoded = array();
		foreach ($vars as $k => $v) {
			if ($v === null || (is_array($v) && empty($v))) {
				continue;
			}
			if ($v instanceof self) {
				$v = $v->toJS();
			}
			$encoded[$k] = $v;
		}
		return self::encode($encoded);
	}

	/**
	 * Merge values of two like objects.
	 * @param EGmap3ObjectBase $object
	 */
	public function merge(EGmap3ObjectBase $object)
	{
		foreach ($object as $k => $v) {
			if ($v !== null) {
				$this->$k = $v;
			}
		}
	}

	// Taken from Yii Framework, slightly modified
	private static function encode($value)
	{
		if (is_string($value)) {
			if (strpos($value, 'js:') === 0)
				return substr($value, 3);
			if (strpos($value, '{') === 0)
				return $value;
			else
				return "'" . CJavaScript::quote($value) . "'";
		}
		else if ($value === null)
			return 'null';
		else if (is_bool($value))
			return $value ? 'true' : 'false';
		else if (is_integer($value))
			return "$value";
		else if (is_float($value)) {
			if ($value === -INF)
				return 'Number.NEGATIVE_INFINITY';
			else if ($value === INF)
				return 'Number.POSITIVE_INFINITY';
			else
				return rtrim(sprintf('%.16F', $value), '0');  // locale-independent representation
		}
		else if (is_object($value))
			return self::encode(get_object_vars($value));
		else if (is_array($value)) {
			$es = array();
			if (($n = count($value)) > 0 && array_keys($value) !== range(0, $n - 1)) {
				foreach ($value as $k => $v)
					$es[] = "'" . CJavaScript::quote($k) . "':" . self::encode($v);
				return '{' . implode(',', $es) . '}';
			}
			else {
				foreach ($value as $v)
					$es[] = self::encode($v);
				return '[' . implode(',', $es) . ']';
			}
		}
		else
			return '';
	}

}