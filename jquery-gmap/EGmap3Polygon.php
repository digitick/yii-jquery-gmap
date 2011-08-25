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
 * A polygon overlay.
 * @link http://code.google.com/intl/fr/apis/maps/documentation/javascript/reference.html#Rectangle
 */
class EGmap3Polygon extends EGmap3ActionBase
{
	protected $action = 'addPolygon';
	/**
	 * The ordered sequence of coordinates that designates a closed loop.
	 * Unlike polylines, a polygon may consist of one or more paths.
	 * @var array 3D array of latLng points
	 */
	public $paths = array();
	/**
	 * @var EGmap3PolygonOptions
	 */
	protected $options;

	/**
	 * Center the map on the polygon.
	 */
	public function centerOnMap()
	{
		$callback = 'function(polygon){$(this).gmap3({action:"setCenter",args:[polygon.getPath().getArray()[0]]});}';
		$this->addCallback($callback);
	}
}
