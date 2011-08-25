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
