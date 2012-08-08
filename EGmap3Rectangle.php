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
 * A rectangle overlay.
 * @link http://code.google.com/intl/fr/apis/maps/documentation/javascript/reference.html#Rectangle
 */
class EGmap3Rectangle extends EGmap3OverlayBase
{
	protected $action = 'addRectangle';
	/**
	 * @var EGmap3RectangleOptions
	 */
	protected $options;
}