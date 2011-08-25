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
 * An overlay that looks like a bubble and is often connected to a marker.
 * @link http://code.google.com/intl/fr/apis/maps/documentation/javascript/reference.html#InfoWindow
 */
class EGmap3InfoWindow extends EGmap3OverlayBase
{
	protected $action = 'addInfoWindow';
	/**
	 * Address to set marker on
	 * @var string
	 */
	public $address;
	/**
	 * Coordinates to set marker on
	 * @var array
	 */
	public $latLng;
	/**
	 * @var EGmap3InfoWindowOptions
	 */
	protected $options;

	public function attachToMarker()
	{
		$this->action = null;
		$this->address = null;
		$this->latLng = null;
	}
}

