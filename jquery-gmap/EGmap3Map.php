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
 * The map init action.
 */
class EGmap3Map extends EGmap3ActionBase
{
	protected $action = 'init';
	/**
	 * @var EGmap3MapOptions
	 */
	protected $options;

	/**
	 * Capture the map's zoom level to a field
	 * 
	 * @param CModel $model Model containing the attribute
	 * @param string $attribute Name of the model's attribute
	 * @param boolean $generate Whether to generate the field
	 * @param array $htmlOptions HTML options for the field
	 */
	public function captureZoom(CModel $model, $attribute, $generate=true, array $htmlOptions=array())
	{
		if ($generate) {
			echo CHtml::activeHiddenField($model, $attribute, $htmlOptions);
		}
		$attId = CHtml::activeId($model, $attribute);
		$this->addEvent('zoom_changed', "function(map){\$('#{$attId}').val(map.getZoom());}");
	}
}
