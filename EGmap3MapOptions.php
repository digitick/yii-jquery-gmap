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
 * General map options.
 * @author Ianaré Sévi
 */
class EGmap3MapOptions extends EGmap3OptionBase
{
	/**
	 * Color used for the background of the Map div. This color will be visible
	 * when tiles have not yet loaded as the user pans.
	 * @var string
	 */
	public $backgroundColor;
	/**
	 * The initial Map center. Required.
	 * @var array
	 */
	public $center;
	/**
	 * Enables/disables all default UI. May be overridden individually.
	 * @var boolean
	 */
	public $disableDefaultUI;
	/**
	 * Enables/disables zoom and center on double click. Enabled by default.
	 * @var boolean
	 */
	public $disableDoubleClickZoom;
	/**
	 * If false, prevents the map from being dragged. Dragging is enabled by default.
	 * @var boolean
	 */
	public $draggable;
	/**
	 * 	The name or url of the cursor to display on a draggable object.
	 * @var string
	 */
	public $draggableCursor;
	/**
	 * The name or url of the cursor to display when an object is dragging.
	 * @var string
	 */
	public $draggingCursor;
	/**
	 * The heading for aerial imagery in degrees measured clockwise from cardinal direction North.
	 * Headings are snapped to the nearest available angle for which imagery is available.
	 * @var integer
	 */
	public $heading;
	/**
	 * If false, prevents the map from being controlled by the keyboard.
	 * Keyboard shortcuts are enabled by default.
	 * @var boolean
	 */
	public $keyboardShortcuts;
	/**
	 * 	The initial enabled/disabled state of the Map type control.
	 * @var boolean
	 */
	public $mapTypeControl;
	/**
	 * The initial display options for the Map type control.
	 * @var EGmap3MapTypeControlOptions
	 */
	public $mapTypeControlOptions;
	/**
	 * The initial Map mapTypeId. Required.
	 * @var string One of 'EGmap3MApTypeId::HYBRID', 'EGmap3MApTypeId::ROADMAP',
	 * 'EGmap3MApTypeId::SATELLITE', 'EGmap3MApTypeId::TERRAIN'
	 */
	public $mapTypeId;
	/**
	 * The maximum zoom level which will be displayed on the map.
	 * If null, the maximum zoom from the current map type is used instead.
	 * @var integer
	 */
	public $maxZoom;
	/**
	 * The minimum zoom level which will be displayed on the map.
	 * If null, the minimum zoom from the current map type is used instead.
	 * @var integer
	 */
	public $minZoom;
	/**
	 * If true, do not clear the contents of the Map div.
	 * @var boolean
	 */
	public $noClear;
	/**
	 * The enabled/disabled state of the Overview Map control.
	 * @var boolean
	 */
	public $overviewMapControl;
	/**
	 * The display options for the Overview Map control.
	 * @var EGmap3OverviewMapControlOptions
	 */
	public $overviewMapControlOptions;
	/**
	 * The enabled/disabled state of the Pan control.
	 * @var boolean
	 */
	public $panControl;
	/**
	 * The display options for the Pan control.
	 * @var EGmap3PanControlOptions
	 */
	public $panControlOptions;
	/**
	 * The enabled/disabled state of the Rotate control.
	 * @var boolean
	 */
	public $rotateControl;
	/**
	 * The display options for the Rotate control.
	 * @var EGmap3RotateControlOptions
	 */
	public $rotateControlOptions;
	/**
	 * The initial enabled/disabled state of the Scale control.
	 * @var boolean
	 */
	public $scaleControl;
	/**
	 * The initial display options for the Scale control.
	 * @var EGmap3ScaleControlOptions
	 */
	public $scaleControlOptions;
	/**
	 * If false, disables scrollwheel zooming on the map. Enabled by default.
	 * @var boolean
	 */
	public $scrollwheel;
	/**
	 * @var EGmap3StreetViewPanorama A StreetViewPanorama to display when the
	 * Street View pegman is dropped on the map. If no panorama is specified,
	 * a default StreetViewPanorama will be displayed in the map's div when the
	 * pegman is dropped.
	 */
	public $streetView;
	/**
	 * The initial enabled/disabled state of the Street View Pegman control.
	 * @var boolean
	 */
	public $streetViewControl;
	/**
	 * The initial display options for the Street View Pegman control.
	 * @var EGmap3StreetViewControlOptions
	 */
	public $streetViewControlOptions;
	/**
	 * 	The angle of incidence of the map as measured in degrees from the
	 * viewport plane to the map plane. The only currently supported values are
	 * 0, indicating no angle of incidence (no tilt), and 45, indicating a tilt
	 * of 45deg;. 45deg; imagery is only available for SATELLITE and HYBRID map
	 * types, within some locations, and at some zoom levels.
	 * @var integer
	 */
	public $tilt;
	/**
	 * The initial Map zoom level.
	 * @var integer
	 */
	public $zoom;
	/**
	 * The enabled/disabled state of the Zoom control.
	 * @var boolean
	 */
	public $zoomControl;
	/**
	 * The display options for the Zoom control.
	 * @var EGmap3ZoomControlOptions
	 */
	public $zoomControlOptions;

	public function getOptionChecks()
	{
		return array(
			'mapTypeId' => array(
				EGmap3MApTypeId::HYBRID,
				EGmap3MApTypeId::ROADMAP,
				EGmap3MApTypeId::SATELLITE,
				EGmap3MApTypeId::TERRAIN,
			),
			'mapTypeControlOptions' => 'class',
			'overviewMapControlOptions' => 'class',
			'panControlOptions' => 'class',
			'rotateControlOptions' => 'class',
			'scaleControlOptions' => 'class',
			'streetView' => 'class:EGmap3StreetViewPanorama',
			'streetViewControlOptions' => 'class',
			'zoomControlOptions' => 'class'
		);
	}

}
