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
			'stylers' => 'arrayOfClass:EGmap3MapTypeStyler',
		);
	}
}

/**
 * Affects how a map's elements will be styled.
 * Each MapTypeStyler should contain one and only one key. If more than one key
 * is specified in a single MapTypeStyler, all but one will be ignored.
 * For example: var rule = {hue: '#ff0000'}.
 */
class EGmap3MapTypeStyler extends EGmap3OptionBase
{
	/**
	 * @var float Modifies the gamma by raising the lightness to the given power.
	 * Valid values: Floating point numbers, [0.01, 10],
	 * with 1.0 representing no change.
	 */
	public $gamma;
	/**
	 * @var string Sets the hue of the feature to match the hue of the color
	 * supplied. Note that the saturation and lightness of the feature is
	 * conserved, which means that the feature will not match the color supplied
	 * exactly. Valid values: An RGB hex string, i.e. '#ff0000'.
	 */
	public $hue;
	/**
	 * @var boolean Inverts lightness. A value of true will invert the lightness
	 * of the feature while preserving the hue and saturation.
	 */
	public $invert_lightness;
	/**
	 * @var integer Shifts lightness of colors by a percentage of the original
	 * value if decreasing and a percentage of the remaining value if increasing.
	 * Valid values: [-100, 100].
	 */
	public $lightness;
	/**
	 * @var integer Shifts the saturation of colors by a percentage of the
	 * original value if decreasing and a percentage of the remaining value if
	 * increasing. Valid values: [-100, 100].
	 */
	public $saturation;
	/**
	 * @var type Valid values: 'on', 'off' or 'simplifed'.
	 */
	public $visibility;
	
	public function getOptionChecks()
	{
		return array(
			'visibility' => array('on', 'off', 'simplifed'),
		);
	}
}
