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
 * Info window options.
 * @link http://code.google.com/intl/fr/apis/maps/documentation/javascript/reference.html#InfoWindowOptions
 */
class EGmap3InfoWindowOptions extends EGmap3OptionBase
{
	/**
	 * Content to display in the InfoWindow. This can be an HTML element,
	 * a plain-text string, or a string containing HTML. The InfoWindow will be
	 * sized according to the content. To set an explicit size for the content,
	 * set content to be a HTML element with that size.
	 * @var string
	 */
	public $content;
	/**
	 * Disable auto-pan on open. By default, the info window will pan the map
	 * so that it is fully visible when it opens.
	 * @var boolean
	 */
	public $disableAutoPan;
	/**
	 * Maximum width of the infowindow, regardless of content's width.
	 * @var integer
	 */
	public $maxWidth;
	/**
	 * The offset, in pixels, of the tip of the info window from the point on
	 * the map at whose geographical coordinates the info window is anchored.
	 * If an InfoWindow is opened with an anchor, the pixelOffset will be
	 * calculated from the top-center of the anchor's bounds.
	 * @var boolean
	 */
	public $pixelOffset;
	/**
	 * All InfoWindows are displayed on the map in order of their zIndex,
	 * with higher values displaying in front of InfoWindows with lower values.
	 * By default, InfoWinodws are displayed according to their latitude, with
	 * InfoWindows of lower latitudes appearing in front of InfoWindows at
	 * higher latitudes. InfoWindows are always displayed in front of markers.
	 * @var integer
	 */
	public $zIndex;
}