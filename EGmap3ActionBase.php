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
abstract class EGmap3ActionBase extends EGmap3ObjectBase
{
	protected $action;
	/**
	 * @var EGmap3OptionBase
	 */
	protected $options;
	protected $callback = array();
	protected $events = array();
	protected $onces = array();

	/**
	 * Create a new action.
	 * @param mixed $options Associative array or Options object
	 */
	public function __construct($options=null)
	{
		if ($options) {
			$this->setOptions($options);
		}
	}

	/**
	 * Add a JS function to call on a specified event.
	 *
	 * The event will fire every time.
	 *
	 * @param string $event Event type, ex 'mouseover', 'click'.
	 * @param string $function Javascript function to execute.
	 */
	public function addEvent($event, $function)
	{
		$this->events[$event] = $function;
	}

	/**
	 * Get all events.
	 * @return array
	 */
	public function getEvents()
	{
		return $this->events;
	}

	/**
	 * Add a JS function to call on a specified event.
	 *
	 * The event will only fire once.
	 *
	 * @param string $event Event type, ex 'mouseover', 'click'.
	 * @param string $function Javascript function to execute.
	 */
	public function addEventOnce($event, $function)
	{
		$this->onces[$event] = $function;
	}

	/**
	 * Get all events that fire once.
	 * @return array
	 */
	public function getEventOnces()
	{
		return $this->onces;
	}

	protected function eventsToJS(array $events){
		$js = 'js:{';
		foreach ($events as $event => $function){
			$js .= "'$event':$function,";
		}
		$js = rtrim($js, ',');
		$js .= '}';
		return $js;
	}

	/**
	 * Convert the action object into a Javascript string.
	 * @return string
	 */
	public function toJS()
	{
		if (!empty($this->events)) {
			$this->events = $this->eventsToJS($this->events);
		}
		if (!empty($this->onces)) {
			$this->onces = $this->eventsToJS($this->onces);
		}
		return parent::toJS();
	}

	/**
	 * Add a Javascript function to call at the end of the action.
	 * @param string $callback
	 */
	public function addCallback($callback)
	{
		$this->callback[] = 'js:' . $callback;
	}

	/**
	 * Get all callbacks.
	 * @return array
	 */
	public function getCallbacks()
	{
		return $this->callback;
	}

	/**
	 * Get the options container for this action.
	 * @return EGmap3OptionBase
	 */
	public function getOptions()
	{
		return $this->options;
	}

	/**
	 * Set options to apply when creating target object.
	 * @param mixed $options Associative array or EMapMarkerOptions object
	 */
	public function setOptions($options)
	{
		if (is_object($options)) {
			$this->setOptionsObject($options);
		}
		else if (is_array($options)) {
			$this->setOptionsArray($options);
		}
		else {
			throw new CException('Inavlid type given for options.');
		}
		if ($this->options->isEmpty()) {
			unset($this->options);
		}
		else {
			$this->options->verifyOptions();
		}
	}

	/**
	 * Set options object from array.
	 * @param array $options
	 */
	protected function setOptionsArray(array $options)
	{
		if (!is_object($this->options)) {
			$optionClass = $this->getOptionsClass();
			$this->options = new $optionClass();
		}
		foreach ($options as $k => $v) {
			$this->options->$k = $v;
		}
	}

	protected function getOptionsClass()
	{
		return get_class($this) . 'Options';
	}

	/**
	 * Set options object.
	 * @param EGmap3OptionBase $options
	 */
	protected function setOptionsObject(EGmap3OptionBase $options)
	{
		if (is_object($this->options)) {
			$this->options->merge($options);
		}
		else {
			$this->options = $options;
		}
	}

}