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
 * A collection of selectors and stylers that define how the map should be styled.
 * Selectors specify what map elements should be affected and stylers specify
 * how those elements should be modified.
 * 
 * @author Ianaré Sévi
 */
class EGmap3MapTypeStyle extends EGmap3OptionBase
{
	/**
	 * @var string  Selects the element type to which a styler should be applied.
	 * An element type distinguishes between the different representations of a
	 * feature. Optional; if elementType is not specified, the value is assumed
	 * to be 'all'.
	 */
	public $elementType;
	/**
	 * @var string Selects the feature, or group of features, to which a styler
	 * should be applied. Optional; if featureType is not specified,
	 * the value is assumed to be 'all'. 
	 */
	public $featureType;
	/**
	 *
	 * @var EGmap3MapTypeStyler The style rules to apply to the selectors.
	 * The rules are applied to the map's elements in the order they are listed
	 * in this array.
	 */
	public $stylers;

	public function getOptionChecks()
	{
		return array(
			'elementType' => array('all', 'geometry', 'labels'),
			'stylers' => 'array',
		);
	}
}
