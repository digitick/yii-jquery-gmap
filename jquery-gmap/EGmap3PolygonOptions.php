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
class EGmap3PolygonOptions extends EGmap3OptionBase
{
	/**
	 * The bounds.
	 * @var array
	 */
	public $bounds;
	/**
	 * Indicates whether this Polygon handles click events. Defaults to true.
	 * @var boolean
	 */
	public $clickable;
	/**
	 * The fill color in HTML hex style, ie. "#00AAFF"
	 * @var string
	 */
	public $fillColor;
	/**
	 * The fill opacity between 0.0 and 1.0
	 * @var float
	 */
	public $fillOpacity;
	/**
	 * The radius in meters on the Earth's surface.
	 * @var integer
	 */
	public $radius;
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