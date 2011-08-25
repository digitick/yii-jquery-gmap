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
 * Base class for controls having a position option.
 */
abstract class EGmap3MapSubOptionControl extends EGmap3OptionBase
{
	/**
	 * Position id. Used to specify the position of the control on the map.
	 * @var string One of the positions defined in EGmap3ControlPosition.
	 */
	public $position;

	public function getOptionChecks()
	{
		return array(
			'position' => array(
				EGmap3ControlPosition::BOTTOM_CENTER,
				EGmap3ControlPosition::BOTTOM_LEFT,
				EGmap3ControlPosition::BOTTOM_RIGHT,
				EGmap3ControlPosition::LEFT_BOTTOM,
				EGmap3ControlPosition::LEFT_CENTER,
				EGmap3ControlPosition::LEFT_TOP,
				EGmap3ControlPosition::RIGHT_BOTTOM,
				EGmap3ControlPosition::RIGHT_CENTER,
				EGmap3ControlPosition::RIGHT_TOP,
				EGmap3ControlPosition::TOP_CENTER,
				EGmap3ControlPosition::TOP_LEFT,
				EGmap3ControlPosition::TOP_RIGHT,
			),
		);
	}

}

/**
 * Options for the rendering of the map type control.
 */
class EGmap3MapTypeControlOptions extends EGmap3MapSubOptionControl
{
	/**
	 * @var array IDs of map types to show in the control.
	 */
	public $mapTypeIds;
	/**
	 * Style id. Used to select what style of map type control to display.
	 * @var string One of the styles defined in EGmap3MapTypeControlStyle.
	 */
	public $style;

	public function getOptionChecks()
	{
		$array = array('style' => array(
				EGmap3MapTypeControlStyle::DEFAULT_STYLE,
				EGmap3MapTypeControlStyle::DROPDOWN_MENU,
				EGmap3MapTypeControlStyle::HORIZONTAL_BAR
			),
			'mapTypeIds' => 'array'
		);
		return array_merge($array, parent::getOptionChecks());
	}
}

/**
 * Options for the rendering of the Overview Map control.
 */
class EGmap3OverviewMapControlOptions extends EGmap3OptionBase
{
	/**
	 * Whether the control should display in opened mode or collapsed
	 * (minimized) mode. By default, the control is closed.
	 * @var boolean
	 */
	public $opened;
}

/**
 * Options for the rendering of the Street View pegman control on the map.
 */
class EGmap3StreetViewControlOptions extends EGmap3MapSubOptionControl
{
	/**
	 * Position id. Used to specify the position of the control on the map.
	 * The default position is embedded within the navigation (zoom and pan)
	 * controls. If this position is empty or the same as that specified in the
	 * zoomControlOptions or panControlOptions, the Street View control will be
	 * displayed as part of the navigation controls. Otherwise, it will be
	 * displayed separately.
	 * @var string One of the positions defined in EGmap3ControlPosition.
	 */
	public $position;
}

/**
 * Options for the rendering of the map zoom control.
 */
class EGmap3ZoomControlOptions extends EGmap3MapSubOptionControl
{
	/**
	 * Style id. Used to select what style of map type control to display.
	 * @var string One of the styles defined in EGmap3ZoomControlStyle.
	 */
	public $style;

	public function getOptionChecks()
	{
		$array = array('style' => array(
				EGmap3ZoomControlStyle::DEFAULT_STYLE,
				EGmap3ZoomControlStyle::LARGE,
				EGmap3ZoomControlStyle::SMALL
			),
		);
		return array_merge($array, parent::getOptionChecks());
	}

}

/**
 * Options for the rendering of the pan control.
 */
class EGmap3PanControlOptions extends EGmap3MapSubOptionControl
{

}

/**
 * Options for the rendering of the rotate control.
 */
class EGmap3RotateControlOptions extends EGmap3MapSubOptionControl
{

}
