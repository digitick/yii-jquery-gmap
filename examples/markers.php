<?php

/**
 * EGmap3 Yii extension example view file.
 *
 * You can copy this file or its contents into your Yii
 * application for testing.
 *
 */
Yii::import('ext.jquery-gmap.*');

$gmap = new EGmap3Widget();
$gmap->setSize(600, 400);

// base options
$options = array(
	'scaleControl' => true,
	'streetViewControl' => false,
	'zoom' => 9,
	'center' => array(0, 0),
	'mapTypeId' => EGmap3MapTypeId::HYBRID,
	'mapTypeControlOptions' => array(
		'style' => EGmap3MapTypeControlStyle::DROPDOWN_MENU,
		'position' => EGmap3ControlPosition::TOP_CENTER,
	),
);
$gmap->setOptions($options);

// marker with custom icon
$marker = new EGmap3Marker(array(
			'title' => 'hello',
			'icon' => array(
				'url' => 'http://google-maps-icons.googlecode.com/files/dolphins.png',
				'anchor' => array('x' => 1, 'y' => 36),
			//'anchor' => new EGmap3Point(5,5),
			)
		));

// set marker position by address
$marker->address = 'Jacksonville, FL';

// data associated with the marker
$marker->data = 'test data !';

// add a Javascript event on marker click
$js = "function(marker, event, data){
        var map = $(this).gmap3('get'),
        infowindow = $(this).gmap3({action:'get', name:'infowindow'});
        if (infowindow){
            infowindow.open(map, marker);
            infowindow.setContent(data);
        } else {
            $(this).gmap3({action:'addinfowindow', anchor:marker, options:{content: data}});
        }
}";
$marker->addEvent('click', $js);

// center the map on the marker
$marker->centerOnMap();

$gmap->add($marker);

$gmap->renderMap();
?>
