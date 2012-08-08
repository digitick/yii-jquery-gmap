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
 * Identifiers for common MapTypes.
 */
class EGmap3MapTypeId
{
	/**
	 * This map type displays a transparent layer of major streets on satellite images.
	 */
	const HYBRID = 'js:google.maps.MapTypeId.HYBRID';
	/**
	 * This map type displays a normal street map.
	 */
	const ROADMAP = 'js:google.maps.MapTypeId.ROADMAP';
	/**
	 * This map type displays satellite images.
	 */
	const SATELLITE = 'js:google.maps.MapTypeId.SATELLITE';
	/**
	 * This map type displays maps with physical features such as terrain and vegetation.
	 */
	const TERRAIN = 'js:google.maps.MapTypeId.TERRAIN';
}

/**
 * Identifiers for the zoom control.
 */
class EGmap3ZoomControlStyle
{
	/**
	 * The default zoom control. The control which DEFAULT maps to will
	 * vary according to map size and other factors.
	 */
	const DEFAULT_STYLE = 'js:google.maps.ZoomControlStyle.DEFAULT';
	/**
	 * The larger control, with the zoom slider in addition to +/- buttons.
	 */
	const LARGE = 'js:google.maps.ZoomControlStyle.LARGE';
	/**
	 * A small control with buttons to zoom in and out.
	 */
	const SMALL = 'js:google.maps.ZoomControlStyle.SMALL';
}

/**
 * Identifiers used to specify the placement of controls on the map.
 * Controls are positioned relative to other controls in the same layout position.
 * Controls that are added first are positioned closer to the edge of the map.
 */
class EGmap3ControlPosition
{
	const BOTTOM_CENTER = 'js:google.maps.ControlPosition.BOTTOM_CENTER';
	const BOTTOM_LEFT = 'js:google.maps.ControlPosition.BOTTOM_LEFT';
	const BOTTOM_RIGHT = 'js:google.maps.ControlPosition.BOTTOM_RIGHT';
	const LEFT_BOTTOM = 'js:google.maps.ControlPosition.LEFT_BOTTOM';
	const LEFT_CENTER = 'js:google.maps.ControlPosition.LEFT_CENTER';
	const LEFT_TOP = 'js:google.maps.ControlPosition.LEFT_TOP';
	const RIGHT_BOTTOM = 'js:google.maps.ControlPosition.RIGHT_BOTTOM';
	const RIGHT_CENTER = 'js:google.maps.ControlPosition.RIGHT_CENTER';
	const RIGHT_TOP = 'js:google.maps.ControlPosition.RIGHT_TOP';
	const TOP_CENTER = 'js:google.maps.ControlPosition.TOP_CENTER';
	const TOP_LEFT = 'js:google.maps.ControlPosition.TOP_LEFT';
	const TOP_RIGHT = 'js:google.maps.ControlPosition.TOP_RIGHT';
}

/**
 * Identifiers for common MapTypesControls.
 */
class EGmap3MapTypeControlStyle
{
	/**
	 * Uses the default map type control. The control which DEFAULT maps to
	 * will vary according to window size and other factors.
	 */
	const DEFAULT_STYLE = 'js:google.maps.MapTypeControlStyle.DEFAULT';
	/**
	 * A dropdown menu for the screen realestate conscious.
	 */
	const DROPDOWN_MENU = 'js:google.maps.MapTypeControlStyle.DROPDOWN_MENU';
	/**
	 * The standard horizontal radio buttons bar.
	 */
	const HORIZONTAL_BAR = 'js:google.maps.MapTypeControlStyle.HORIZONTAL_BAR';
}

/**
 * The valid travel modes that can be specified in a DirectionsRequest as well
 * as the travel modes returned in a DirectionsStep.
 */
class EGmap3DirectionsTravelMode
{
	const BICYCLING = 'js:google.maps.DirectionsTravelMode.BICYCLING';
	const DRIVING = 'js:google.maps.DirectionsTravelMode.DRIVING';
	const WALKING = 'js:google.maps.DirectionsTravelMode.WALKING';
}

/**
 * Identifiers for scale control ids.
 */
class EGmap3ScaleControlStyle
{
	/**
	 * The standard scale control.
	 */
	const DEFAULT_STYLE = 'js:google.maps.ScaleControlStyle.DEFAULT';
}

class EGmap3Animation
{
	const BOUNCE = 'js:google.maps.Animation.BOUNCE';
	const DROP = 'js:google.maps.Animation.DROP';
}