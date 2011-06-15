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
 * Circle options.
 * @link http://code.google.com/intl/fr/apis/maps/documentation/javascript/reference.html#CircleOptions
 */
class EGmap3PolylineOptions extends EGmap3OptionBase
{
	/**
	 * Indicates whether this Polyline handles click events. Defaults to true.
	 * @var boolean
	 */
	public $clickable;
	/**
	 * Render each edge as a geodesic (a segment of a "great circle").
	 * A geodesic is the shortest path between two points along the surface of
	 * the Earth.
	 * @var boolean
	 */
	public $geodesic;
	/**
	 * The stroke color. All CSS3 colors are supported except for extended
	 * named colors.
	 * @var string
	 */
	public $strokeColor;
	/**
	 * The stroke opacity between 0.0 and 1.0
	 * @var float
	 */
	public $strokeOpacity;
	/**
	 * The stroke width in pixels.
	 * @var integer
	 */
	public $strokeWeight;
	/**
	 * The zIndex compared to other polys.
	 * @var integer
	 */
	public $zIndex;
}