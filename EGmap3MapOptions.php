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
	 * @var string Color used for the background of the Map div.
	 * 
	 * This color will be visible when tiles have not yet loaded as the user pans.
	 */
	public $backgroundColor;
	/**
	 * @var array The initial Map center. Required.
	 */
	public $center;
	/**
	 * @var boolean Enables/disables all default UI.
	 * May be overridden individually.
	 */
	public $disableDefaultUI;
	/**
	 * @var boolean Enables/disables zoom and center on double click.
	 * Enabled by default.
	 */
	public $disableDoubleClickZoom;
	/**
	 * @var boolean If false, prevents the map from being dragged. Dragging is
	 * enabled by default.
	 */
	public $draggable;
	/**
	 * @var string The name or url of the cursor to display on a draggable object.
	 */
	public $draggableCursor;
	/**
	 * @var string The name or url of the cursor to display when an object is
	 * dragging.
	 */
	public $draggingCursor;
	/**
	 *  @var integer The heading for aerial imagery in degrees measured
	 * clockwise from cardinal direction North.
	 * 
	 * Headings are snapped to the nearest available angle for which imagery is
	 * available.
	 */
	public $heading;
	/**
	 * @var boolean If false, prevents the map from being controlled by the keyboard.
	 * Keyboard shortcuts are enabled by default.
	 */
	public $keyboardShortcuts;
	/**
	 * @var boolean The initial enabled/disabled state of the Map type control.
	 */
	public $mapTypeControl;
	/**
	 * @var EGmap3MapTypeControlOptions The initial display options for the Map
	 * type control.
	 */
	public $mapTypeControlOptions;
	/**
	 * @var string The initial Map mapTypeId. Required.
	 * 
	 * One of 'EGmap3MApTypeId::HYBRID', 'EGmap3MApTypeId::ROADMAP',
	 * 'EGmap3MApTypeId::SATELLITE', 'EGmap3MApTypeId::TERRAIN'
	 */
	public $mapTypeId;
	/**
	 * @var integer The maximum zoom level which will be displayed on the map.
	 * If null, the maximum zoom from the current map type is used instead.
	 */
	public $maxZoom;
	/**
	 * @var integer The minimum zoom level which will be displayed on the map.
	 * If null, the minimum zoom from the current map type is used instead.
	 */
	public $minZoom;
	/**
	 * @var boolean If true, do not clear the contents of the Map div.
	 */
	public $noClear;
	/**
	 * @var boolean The enabled/disabled state of the Overview Map control.
	 */
	public $overviewMapControl;
	/**
	 * @var EGmap3OverviewMapControlOptions The display options for the
	 * Overview Map control.
	 */
	public $overviewMapControlOptions;
	/**
	 * @var boolean The enabled/disabled state of the Pan control.
	 */
	public $panControl;
	/**
	 * @var EGmap3PanControlOptions The display options for the Pan control.
	 */
	public $panControlOptions;
	/**
	 * @var boolean The enabled/disabled state of the Rotate control.
	 */
	public $rotateControl;
	/**
	 * @var EGmap3RotateControlOptions The display options for the Rotate
	 * control.
	 */
	public $rotateControlOptions;
	/**
	 * @var boolean The initial enabled/disabled state of the Scale control.
	 */
	public $scaleControl;
	/**
	 * @var EGmap3ScaleControlOptions The initial display options for the Scale control.
	 */
	public $scaleControlOptions;
	/**
	 * @var boolean If false, disables scrollwheel zooming on the map.
	 * Enabled by default.
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
	 * @var boolean The initial enabled/disabled state of the Street View
	 * Pegman control.
	 */
	public $streetViewControl;
	/**
	 * @var EGmap3StreetViewControlOptions The initial display options for the
	 * Street View Pegman control.
	 */
	public $streetViewControlOptions;
	/**
	 *  @var integer The angle of incidence of the map as measured in degrees
	 * from the viewport plane to the map plane.
	 * 
	 * The only currently supported values are 0, indicating no angle of
	 * incidence (no tilt), and 45, indicating a tilt of 45°. 45° imagery is
	 * only available for SATELLITE and HYBRID map types, within some
	 * locations, and at some zoom levels.
	 */
	public $tilt;
	/**
	 * @var integer The initial Map zoom level.
	 */
	public $zoom;
	/**
	 * @var boolean The enabled/disabled state of the Zoom control.
	 */
	public $zoomControl;
	/**
	 * @var EGmap3ZoomControlOptions The display options for the Zoom control.
	 */
	public $zoomControlOptions;

	public function getOptionChecks()
	{
		return array(
			'center' => 'array',
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
