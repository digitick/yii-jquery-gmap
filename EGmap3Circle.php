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
 * A circle drawn on a map.
 * @link http://code.google.com/intl/fr/apis/maps/documentation/javascript/reference.html#Circle
 */
class EGmap3Circle extends EGmap3OverlayBase
{
	protected $action = 'addCircle';
	/**
	 * Address to set circle on
	 * @var string
	 */
	public $address;
	/**
	 * Coordinates to set circle on
	 * @var array
	 */
	public $latLng;
	/**
	 * @var EGmap3CircleOptions
	 */
	protected $options;
}