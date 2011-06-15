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
 * Renders directions retrieved in the form of a DirectionsResult object
 * retrieved from the DirectionsService.
 * @link http://code.google.com/intl/fr/apis/maps/documentation/javascript/reference.html#DirectionsRenderer
 */
class EGmap3DirectionsRenderer extends EGmap3OverlayBase
{
	protected $action = 'addDirectionsRenderer';
	/**
	 * @var EGmap3CircleOptions
	 */
	protected $options;
}