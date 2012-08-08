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
 * A cluster of map markers.
 */
class EGmap3MarkerCluster extends EGmap3OverlayBase
{
	protected $action = 'addMarkers';
	/** @var integer Distance in pixels to merge markers in a cluster. */
	public $radius = 50;
	/** @var array Marker definitions (latitude, logitude, data). */
	public $markers = array();
	/** @var array Rules to manage clusters. */
	public $clusters = array();
	/** @var string Reference to the clusters to add new markers. */
	public $to;
	/** @var EGmap3Marker Settings to use on markers not in a cluster. */
	public $marker;
}