<?php

/**
 * EGmap3 Yii extension
 * 
 * Object oriented PHP interface to GMAP3 Javascript library for
 * Google Maps.
 *
 * GMAP3 was originally written by DEMONTE Jean-Baptiste.
 * Special permission has been granted to release under the LGPL for
 * this extension.
 * @link http://gmap3.net
 *
 * This extension has taken some ideas (but no code) from Antonio Ramirez'
 * egmap Yii extension.
 * @link http://www.yiiframework.com/extension/egmap
 *
 * @copyright © Digitick <www.digitick.net> 2011
 * @license GNU Lesser General Public License v3.0
 * @author Ianaré Sévi
 *
 */
// load these like this so small classes can be combined into fewer files.
require_once 'EGmap3Constants.php';
require_once 'EGmap3MapSubOptions.php';
require_once 'EGmap3Primitives.php';

/**
 * Main class.
 * 
 * @author Ianaré Sévi
 */
class EGmap3Widget extends CWidget
{
	/**
	 * @var boolean Use minified version of gmap3 library, defaults to true.
	 */
	public $mini = true;
	/**
	 * @var integer Width of the map widget. By default uses 'px' but other
	 * units may be used.
	 */
	public $width = 550;
	/**
	 * @var integer Height of the map widget. By default uses 'px' but other
	 * units may be used.
	 */
	public $height = 400;
	/**
	 * @var string CSS size unit to use, such as : 'px', 'em', 'pt', etc ..
	 */
	public $unit = 'px';
	/**
	 * @var boolean Set the map widget to be resizable, default is false.
	 */
	public $resizable = false;
	/**
	 * @var boolean Show a layer that displays bike lanes and paths and demotes
	 * large roads.
	 */
	public $bicyclingLayer;
	/**
	 * @var boolean Show a layer that displays current road traffic.
	 */
	public $trafficLayer;
	/**
	 * @var boolean Zoom the map to automatically fit the elements it contains.
	 */
	public $autofit;
	//
	protected $rectangles = array();
	protected $polygons = array();
	protected $polylines = array();
	protected $routes = array();
	protected $markers = array();
	protected $circles = array();
	protected $kmlLayers = array();
	protected $styledMaps = array();
	/**
	 * @var EGmap3Map The map itself.
	 */
	protected $map;

	/**
	 * Create a new Google map widget.
	 * @param mixed $options Associative array or Options object
	 */
	public function __construct($options=null)
	{
		if ($options) {
			$this->setOptions($options);
		}
	}

	public function initOptions()
	{
		if (!is_object($this->map)) {
			$this->map = new EGmap3Map();
		}
	}

	/**
	 * Set the map display size.
	 * @param integer $width The width.
	 * @param integer $height The height.
	 * @param string $unit CSS size unit to use, such as : 'px', 'em', 'pt', etc ..
	 */
	public function setSize($width, $height, $unit='px')
	{
		$this->width = $width;
		$this->height = $height;
		$this->unit = $unit;
	}

	/**
	 * Set map options.
	 * @param EMapOptions $options
	 */
	public function setOptions($options)
	{
		$this->initOptions();
		$this->map->setOptions($options);
	}

	/**
	 * @return EGmap3MapOptions
	 */
	public function getOptions()
	{
		$this->initOptions();
		return $this->map->getOptions();
	}

	/**
	 * Add an action to the map.
	 * 
	 * @param EGmap3ActionBase $action 
	 */
	public function add(EGmap3ActionBase $action)
	{
		switch (get_class($action)) {
			case 'EGmap3Marker':
				$this->markers[] = $action;
				break;
			case 'EGmap3InfoWindow':
				$this->markers[] = $action;
				break;
			case 'EGmap3Circle':
				$this->circles[] = $action;
				break;
			case 'EGmap3Rectangle':
				$this->rectangles[] = $action;
				break;
			case 'EGmap3Polygon':
				$this->polygons[] = $action;
				break;
			case 'EGmap3Polyline':
				$this->polylines[] = $action;
				break;
			case 'EGmap3Route':
				$this->routes[] = $action;
				break;
			case 'EGmap3StyledMap':
				$this->styledMaps[] = $action;
				break;
			default:
				throw new CException('Invalid type given to add.');
				break;
		}
	}

	public function getMarkers()
	{
		return $this->markers;
	}

	public function getCircles()
	{
		return $this->markers;
	}

	public function getRectangles()
	{
		return $this->rectangles;
	}

	public function getPolygons()
	{
		return $this->polygons;
	}

	public function getRoutes()
	{
		return $this->routes;
	}
	
	public function getStyledMaps()
	{
		return $this->styledMaps;
	}

	/**
	 * Registers the core script files.
	 * This method registers jquery and JUI JavaScript files and the theme CSS file.
	 */
	protected function registerCoreScripts()
	{
		$params = array(
			'sensor' => 'false',
			'language' => Yii::app()->getLanguage()
		);
		$http = (Yii::app()->getRequest()->isSecureConnection)?'https':'http';
		$apiScript = $http.'://maps.google.com/maps/api/js?' . http_build_query($params);

		$assets = Yii::app()->assetManager->publish(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'assets');
		$cs = Yii::app()->getClientScript();
		$cs->registerCoreScript('jquery');

		$cs->registerScriptFile($apiScript)
			->registerScriptFile($assets . (($this->mini) ? '/gmap3.min.js' : '/gmap3.js'));
		
		if ($this->resizable) {
			$cs->registerCoreScript('jquery.ui');
			$cs->registerCssFile($cs->getCoreScriptUrl().'/jui/css/base/jquery-ui.css');
		}
	}

	/**
	 * Update a marker on the map using a Yii model's fields. The model fields
	 * must exist on the page.
	 *
	 * @param CModel $model Model to use
	 * @param array $attributes Model attributes to use for building the address.
	 * Must be given in the correct order !
	 * @param array $options Options to set :<ul>
	 * <li>'first' - set to first marker added to map, default is last
	 * <li>'nopan' - do not pan the map on marker update.
	 * <li>'event' => 'change' - valid jQuery event to trigger map update.
	 * </ul>
	 */
	public function updateMarkerAddressFromModel(CModel $model, array $attributes, array $options=array())
	{
		// get attribute IDs
		for ($i = 0; $i < count($attributes); $i++) {
			$attributes[$i] = CHtml::activeId($model, $attributes[$i]);
		}
		// build the hidden field
		$fieldId = $this->id . '_gmap3MarkerAddress';
		echo CHtml::hiddenField('gmap3MarkerAddress', null, array('id' => $fieldId));

		// options
		$marker = (in_array('first', $options)) ? 'first:true' : 'last:true';
		$pan = (in_array('nopan', $options)) ? '' : "$('#{$this->id}').gmap3({action:'panTo',args:[marker.position]});";

		// construct marker position updater function
		$setFunction = $this->id . 'setMarkerPosition';
		$script = "function {$setFunction}(){
		var addr = $('#{$fieldId}').val();
		if ( !addr || !addr.length ) return;
		marker = \$('#{$this->id}').gmap3({action:'get',name:'marker', {$marker}});
		$('#{$this->id}').gmap3({
			action: 'getlatlng',
			address: addr,
			callback: function(results){
				if ( !results ) return;
				latLng = results[0].geometry.location;
				marker.setPosition(latLng);
				{$pan}
			}
		});}";
		// construct address field updater function
		$upFunction = $this->id . 'updateAddressField';
		$jsAttributes = CJavaScript::encode($attributes);
		$modelClass = get_class($model);
		$script .= "
		function {$upFunction}() {
			var add = '';
			var fields = {$jsAttributes};
			for (var i = 0; i < fields.length; i++) {
				field = $('#'+fields[i]);
				if (!field[0]){continue;}
				if (field[0].type == 'select-one'){
					value = $('#'+fields[i] +' :selected').text();
				}
				else {value = field.val();}
				if (value && value != 0) {
					add += value + ', ';
				}
			}
			add = add.substring(0, add.length - 2);
			$('#{$fieldId}').val(add);
			{$setFunction}();
		}";

		if (isset($options['event'])) {
			$eventType = $options['event'];
		}
		else {
			$eventType = 'change';
		}
		$sAttributes = implode(',#', $attributes);
		$script .= "$(document).delegate('#{$sAttributes}', '{$eventType}', function(){{$upFunction}();});";
		$this->registerScript($script);
	}

	protected function registerScript($script, $position=CClientScript::POS_END)
	{
		$uid = md5($script);
		$script = preg_replace('/[\n\r\t]/', null, $script);
		Yii::app()->getClientScript()->registerScript($uid, $script, $position);
	}
	
	/**
	 * Used internally, should not be called.
	 */
	public function init()
	{
		$this->registerCoreScripts();

		// action initialize
		$script = $this->map->toJS();

		// add objectified actions
		$overlays = array(
			'routes', 'markers', 'circles', 'rectangles', 'polygons', 'polylines',
			'styledMaps',
		);
		foreach ($overlays as $actions) {
			foreach ($this->$actions as $action) {
				$script .= ',' . $action->toJs();
			}
		}
		// other actions
		if ($this->bicyclingLayer === true) {
			$script .= ",{action:'addBicyclingLayer'}";
		}
		if ($this->trafficLayer === true) {
			$script .= ",{action:'addTrafficLayer'}";
		}
		if ($this->autofit === true) {
			$script .= ",{action:'autofit'}";
		}

		$script = "jQuery('#{$this->id}').gmap3($script)";
		if ($this->resizable === true) {
			$script .= '.resizable()';
		}
		$script .= ';';

//		$script="jQuery('#yw0').gmap3({
//    'action': 'init',
//    'options': {
//        'center': ['41.850033', '-87.650052'],
//        'mapTypeControlOptions': {
//            'mapTypeIds': [google.maps.MapTypeId.ROADMAP, 'style1']
//        },
//        'mapTypeId': google.maps.MapTypeId.ROADMAP,
//        'zoom': 12
//    }
//}, {
//    'action': 'addStyledMap',
//    'id': 'style1',
//    'options': {
//        'name': 'style 1'
//    },
//	'style': [{
//	'elementType': 'geometry',
//        'featureType': 'road.highway',
//        'stylers': [{
//            'hue': '#ff0022',
//            'saturation': 60,
//            'lightness': -20
//        }]
//		}]
//});";
		//print_r($script);die;

		$this->registerScript($script);

		parent::init();
	}

	/**
	 * Used internally, should not be called.
	 */
	public function run()
	{
		echo CHtml::openTag('div', array(
			'id' => $this->id,
			'class' => 'gmap3',
			'style' => "width:{$this->width}{$this->unit};height:{$this->height}{$this->unit}")),
		CHtml::closeTag('div');
	}

	/**
	 * Attach all action objects to the map, convert them to Javascript,
	 * and render the map inside the widget.
	 * 
	 * MUST be last method call.
	 */
	public function renderMap()
	{
		$this->init();
		$this->run();
	}

}