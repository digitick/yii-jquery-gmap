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
	 * @var boolean If true, the marker receives mouse and touch events.
	 * Default value is true.
	 */
	public $clickable;
	/**
	 * @var string Mouse cursor to show on hover
	 */
	public $cursor;
	/**
	 * @var boolean If true, the marker can be dragged. Default value is false.
	 */
	public $draggable;
	/**
	 * @var boolean If true, the marker shadow will not be displayed.
	 */
	public $flat;
	/**
	 * @var mixed Icon for the foreground
	 */
	public $icon;
	/**
	 * @var boolean If false, rendering will not be optimized for this marker.
	 */
	public $optimized;
	/**
	 * @var boolean If false, disables raising and lowering the marker on drag.
	 * True by default.
	 */
	public $raiseOnDrag;
	/**
	 * @var mixed Shadow image
	 */
	public $shadow;
	/**
	 * @var EGmap3MarkerShape Image map region definition used for drag/click.
	 */
	public $shape;
	/**
	 * @var string Rollover text
	 */
	public $title;
	/**
	 * @var boolean If true, the marker is visible
	 */
	public $visible;
	/**
	 * @var integer	All markers are displayed on the map in order of their zIndex,
	 * with higher values displaying in front of markers with lower values.
	 * By default, markers are displayed according to their vertical position
	 * on screen, with lower markers appearing in front of markers further up
	 * the screen.
	 */
	public $zIndex;

	public function getOptionChecks()
	{
		return array(
			'shadow' => 'class:EGmap3MarkerShape',
		);
	}
}

/**
 * A structure representing a Marker icon or shadow image.
 */
class EGmap3MarkerImage extends EGmap3OptionBase
{
	/**
	 * @var EGmap3Point The position at which to anchor an image in correspondance to
	 * the location of the marker on the map. By default, the anchor is located
	 * along the center point of the bottom of the image.
	 */
	public $anchor;
	/**
	 * @var EGmap3Point The position of the image within a sprite, if any.
	 * By default, the origin is located at the top left corner of the
	 * image (0, 0).
	 */
	public $origin;
	/**
	 * @var EGmap3Size The size of the entire image after scaling, if any.
	 * Use this property to stretch/shrink an image or a sprite. 
	 */
	public $scaledSize;
	/**
	 * @var EGmap3Size The display size of the sprite or image. When using sprites,
	 * you must specify the sprite size. If the size is not provided,
	 * it will be set when the image loads.
	 */
	public $size;
	/**
	 * @var string The URL of the image or sprite sheet.
	 */
	public $url;
	
	public function getOptionChecks()
	{
		return array(
			'anchor' => 'point',
			'origin' => 'point',
			'scaledSize' => 'size',
			'size' => 'size',
		);
	}
}

/**
 * This object defines the marker shape to use in determination of a marker's
 * clickable region. The shape consists of two properties — type and coord —
 * which define the general type of marker and coordinates specific to that
 * type of marker.
 */
class EGmap3MarkerShape extends EGmap3OptionBase
{
	/**
	 * @var array The format of this attribute depends on the value of the type
	 * and follows the w3 AREA coords specification found at
	 * @link http://www.w3.org/TR/REC-html40/struct/objects.html#adef-coords. 
	 */
	public $coords;
	/**
	 * @var string Describes the shape's type and can be circle, poly or rect.
	 */
	public $type;
}
