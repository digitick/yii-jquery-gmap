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
class EGmap3CircleOptions extends EGmap3OptionBase
{
	/**
	 * @var array The center
	 */
	public $center;
	/**
	 * @var boolean Indicates whether this Circle handles click events.
	 * Defaults to true.
	 */
	public $clickable;
	/**
	 * @var string The fill color. All CSS3 colors are supported except for
	 * extended named colors.
	 */
	public $fillColor;
	/**
	 * @var float The fill opacity between 0.0 and 1.0
	 */
	public $fillOpacity;
	/**
	 * @var integer The radius in meters on the Earth's surface.
	 */
	public $radius;
	/**
	 * @var string The stroke color. All CSS3 colors are supported except for
	 * extended named colors.
	 */
	public $strokeColor;
	/**
	 * @var float The stroke opacity between 0.0 and 1.0
	 */
	public $strokeOpacity;
	/**
	 * @var integer The stroke width in pixels.
	 */
	public $strokeWeight;
	/**
	 * @var integer The zIndex compared to other polys.
	 */
	public $zIndex;
	
	public function getOptionChecks()
	{
		$array = array(
			'center' => 'array'
		);
		return array_merge($array, parent::getOptionChecks());
	}
}