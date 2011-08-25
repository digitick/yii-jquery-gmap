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
 * A map marker.
 * @link http://code.google.com/intl/fr/apis/maps/documentation/javascript/reference.html#Marker
 */
class EGmap3StyledMap extends EGmap3ActionBase
{
	protected $action = 'addStyledMap';
	protected $style = array();
	public $id;
	
	/**
	 * Create a new action.
	 * @param string An identifier for this style.
	 * @param mixed $options Associative array or Options object
	 */
	public function __construct($id, $options=null)
	{
		$this->id = $id;
		
		parent::__construct($options);
	}

	public function addStyle($style)
	{
		if (is_object($style) && $style instanceof EGmap3MapTypeStyle) {
			$styleObject = $style;
		}
		else if (is_array($style)) {
			$styleObject = new EGmap3MapTypeStyle;
			foreach ($style as $k => $v) {
				$styleObject->$k = $v;
			}
		}
		else {
			throw new CException('Inavlid type given for map style.');
		}
		
		$styleObject->verifyOptions();

		$this->style[] = $styleObject;
	}
}