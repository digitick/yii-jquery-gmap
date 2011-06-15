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
 * A map marker.
 * @link http://code.google.com/intl/fr/apis/maps/documentation/javascript/reference.html#Marker
 */
class EGmap3Marker extends EGmap3OverlayBase
{
	protected $action = 'addMarker';
	/**
	 * Address to set marker on
	 * @var string
	 */
	public $address;
	/**
	 * Coordinates to set marker on
	 * @var array
	 */
	public $latLng;
	/**
	 * @var EGmap3MarkerOptions
	 */
	protected $options;
	/**
	 * An info window associated to this marker.
	 * @var EGmap3InfoWindow
	 */
	protected $infowindow;

	/**
	 * Capture the latitude and longitude of the marker to a model.
	 * 
	 * @param CModel $model Model object
	 * @param string $lat Attribute name for latitude
	 * @param string $lng Attribute name for longitude
	 * @param array $options Options to set :<ul>
	 * <li>'visible' - show the input fields
	 * <li>'nocallback' - do not update on callback
	 * <li>'nodragend' - do not update on dragend
	 * <li>'drag' - update on drag
	 * </ul>
	 */
	public function capturePosition(CModel $model, $lat, $lng, array $options=array())
	{
		// field options
		if (in_array('visible', $options)) {
			echo CHtml::activeLabelEx($model, $lat), CHtml::activeTextField($model, $lat);
			echo '<br>';
			echo CHtml::activeLabelEx($model, $lng), CHtml::activeTextField($model, $lng);
		}
		else {
			echo CHtml::activeHiddenField($model, $lat), CHtml::activeHiddenField($model, $lng);
		}
		$latId = CHtml::activeId($model, $lat);
		$lngId = CHtml::activeId($model, $lng);

		// update function
		$jsFunction = "function captureMarkerPosition(marker){\$('#$latId').val(marker.getPosition().lat());\$('#$lngId').val(marker.getPosition().lng());}";
		Yii::app()->getClientScript()->registerScript(__CLASS__.'#capturePosition', $jsFunction, CClientScript::POS_END);

		// event options
		if (!in_array('nocallback', $options)){
			$this->addCallback('function(result){captureMarkerPosition(result);}');
		}
		if (!in_array('nodragend', $options)){
			$this->addEvent('dragend', 'function(result){captureMarkerPosition(result);}');
		}
		if (in_array('drag', $options)){
			$this->addEvent('drag', 'function(result){captureMarkerPosition(result);}');
		}
		$this->addEvent('position_changed', 'function(result){captureMarkerPosition(result);}');
	}

	public function addInfoWindow(EGmap3InfoWindow $infoWindow)
	{
		$infoWindow->attachToMarker();
		$this->infowindow = $infoWindow;
	}
}