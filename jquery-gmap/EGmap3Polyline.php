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
 * A polyline overlay.
 * @link http://code.google.com/intl/fr/apis/maps/documentation/javascript/reference.html#Rectangle
 */
class EGmap3Polyline extends EGmap3ActionBase
{
	protected $action = 'addPolyline';
	/**
	 * The ordered sequence of coordinates of the Polyline.
	 * @var array 3D array of latLng points
	 */
	public $path = array();
	/**
	 * @var EGmap3PolylineOptions
	 */
	protected $options;

	/**
	 * Center the map on the polyline.
	 */
	public function centerOnMap()
	{
		$callback = 'function(polyline){$(this).gmap3({action:"setCenter",args:[polyline.getPath().getArray()[0]]});}';
		$this->addCallback($callback);
	}
}
