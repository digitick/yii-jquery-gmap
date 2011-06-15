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
 * Map marker options.
 * @link http://code.google.com/intl/fr/apis/maps/documentation/javascript/reference.html#MarkerOptions
 */
class EGmap3MarkerOptions extends EGmap3OptionBase
{
	/**
	 * If true, the marker receives mouse and touch events. Default value is true.
	 * @var boolean
	 */
	public $clickable;
	/**
	 * Mouse cursor to show on hover
	 * @var string
	 */
	public $cursor;
	/**
	 * If true, the marker can be dragged. Default value is false.
	 * @var boolean
	 */
	public $draggable;
	/**
	 * If true, the marker shadow will not be displayed.
	 * @var boolean
	 */
	public $flat;
	/**
	 * Icon for the foreground
	 * @var string
	 */
	public $icon;
	/**
	 * If false, rendering will not be optimized for this marker.
	 * @var boolean
	 */
	public $optimized;
	/**
	 * If false, disables raising and lowering the marker on drag. True by default.
	 * @var boolean
	 */
	public $raiseOnDrag;
	/**
	 * Shadow image
	 * @var string
	 */
	public $shadow;
	/**
	 * Image map region definition used for drag/click.
	 * @var <type>
	 * @todo
	 */
	public $shape;
	/**
	 * Rollover text
	 * @var string
	 */
	public $title;
	/**
	 * If true, the marker is visible
	 * @var boolean
	 */
	public $visible;
	/**
	 * 	All markers are displayed on the map in order of their zIndex,
	 * with higher values displaying in front of markers with lower values.
	 * By default, markers are displayed according to their vertical position
	 * on screen, with lower markers appearing in front of markers further up
	 * the screen.
	 * @var integer
	 */
	public $zIndex;
}