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
 * A simple direction interface.
 */
class EGmap3Route extends EGmap3ActionBase
{
	protected $action = 'getRoute';
	/**
	 * @var EGmap3RouteOptions
	 */
	protected $options;

	public function __construct($options = null)
	{
		parent::__construct($options);

		$this->callback = 'js:function(result){if(!result)return;$(this).gmap3({action:"addDirectionsRenderer",options:{draggable:false,directions:result}});}';
	}

	public function addCallback($callback)
	{
		throw new CException('Sorry, callbacks are not supported for routes.');
	}

}

class EGmap3RouteOptions extends EGmap3OptionBase
{
	/**
	 * Origin of the route.
	 * @var string
	 */
	public $origin;
	/**
	 * Route destination.
	 * @var string
	 */
	public $destination;
	/**
	 * Mode of travel.
	 * @var string One of the modes defined in EGmap3DirectionsTravelMode.
	 */
	public $travelMode = EGmap3DirectionsTravelMode::DRIVING;

	public function getOptionChecks()
	{
		return array(
			'travelMode' => array(
				EGmap3DirectionsTravelMode::BICYCLING,
				EGmap3DirectionsTravelMode::DRIVING,
				EGmap3DirectionsTravelMode::WALKING
			),
		);
	}

}