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
 * A point on a two-dimensional plane.
 */
class EGmap3Point extends EGmap3OptionBase
{
	/**
	 * @var integer The X coordinate
	 */
	public $x;
	/**
	 * @var integer The Y coordinate
	 */
	public $y;
	
	public function __construct($x=0, $y=0)
	{
		$this->x = $x;
		$this->y = $y;
	}
}

/**
 * Two-dimensonal size, where width is the distance on the x-axis, and height
 * is the distance on the y-axis.
 */
class EGmap3Size extends EGmap3OptionBase
{
	/**
	 * @var integer The height along the y-axis, in pixels.
	 */
	public $height;
	/**
	 * @var integer The width along the x-axis, in pixels.
	 */
	public $width;
	
	public function __construct($width=0, $height=0)
	{
		$this->width = $width;
		$this->height = $height;
	}
}