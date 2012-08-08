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
 * Base class for all actions.
 */
abstract class EGmap3OverlayBase extends EGmap3ActionBase
{
	/**
	 * @var EGmap3MapOptions
	 */
	protected $map;
	/**
	 * Free-form field, it is available as the third parameter in a function
	 * called.
	 * @var string
	 */
	public $data;

	/**
	 * Center the map on the element.
	 */
	public function centerOnMap()
	{
		$this->initMapOptions();
		$this->map->center = true;
	}

	/**
	 * Set the map zoom. Overrides the initial map zoom.
	 * 
	 * @param int $zoom
	 */
	public function setMapZoom($zoom)
	{
		$this->initMapOptions();
		$this->map->zoom = $zoom;
	}

	protected function initMapOptions()
	{
		if (!is_object($this->map)) {
			$this->map = new EGmap3MapOptions();
		}
	}

	/**
	 * Convert the overlay object into a Javascript string.
	 * @return string
	 */
	public function toJS()
	{
		// set elements into the storage object
		if ($this->options || $this->events || $this->onces || $this->callback) {
			// transform class name into gmap3 storage name
			$name = strtolower(str_replace('EGmap3', null, get_class($this)));
			$this->$name = new EGmap3ObjectBase();

			if ($this->options) {
				$this->$name->options = $this->options;
				$this->options = null;
			}
			if ($this->events) {
				$this->$name->events = $this->eventsToJS($this->events);
				$this->events = null;
			}
			if ($this->onces) {
				$this->$name->onces = $this->eventsToJS($this->onces);
				$this->onces = null;
			}
			if ($this->callback) {
				$this->$name->callback = $this->callback;
				$this->callback = null;
			}
			if ($this->data) {
				$this->$name->data = $this->data;
				$this->data = null;
			}
		}
		return parent::toJS();
	}

}