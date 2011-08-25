<?php

/**
 * EGmap3 Yii extension example view file.
 *
 * You can copy this file or its contents into your Yii
 * application for testing.
 *
 */
Yii::import('ext.jquery-gmap.*');

// init widget
$gmap = new EGmap3Widget();
$gmap->setSize(600, 400);

// base options for map
$options = array(
	'zoom' => 12,
	'center' => array('41.850033', '-87.650052'),
	'mapTypeId' => EGmap3MapTypeId::ROADMAP,
	'mapTypeControlOptions' => array(
		// add the map types available, use IDs specified below
		'mapTypeIds' => array(EGmap3MapTypeId::ROADMAP, 'style1', 'style2'),
	),
);
$gmap->setOptions($options);

// init the styled map, specify ID to match mapTypeIds above
$styledMap1 = new EGmap3StyledMap('style1', array('name' => 'Style 1'));

// add a map style
$styledMap1->addStyle(array(
	'featureType' => 'road.highway',
	'elementType' => 'geometry',
	'stylers' => array(
		'hue' => '#ff0022',
		'saturation' => 60,
		'lightness' => -20
	)
));
// add and set the map
$gmap->add($styledMap1);


// Styled Map 2 ...
$styledMap2 = new EGmap3StyledMap('style2', array('name' => 'Style 2'));
$styledMap2->addStyle(array(
	'featureType' => 'road.highway',
	'elementType' => 'geometry',
	'stylers' => array(
		'hue' => '#ff0022',
		'saturation' => 60,
		'lightness' => -20
	)
));
$styledMap2->addStyle(array(
	'featureType' => 'road.arterial',
	'elementType' => 'geometry',
	// stylers may also be array of arrays
	'stylers' => array(
		array(
			'saturation' => 30,
			'lightness' => -40,
		),
		array(
			'hue' => '#2200ff',
			'visibility' => 'simplified'
		)
	)
));
$styledMap2->addStyle(array(
	'featureType' => 'road.local',
	'elementType' => 'all',
	'stylers' => array(
		'hue' => '#f6ff00',
		'saturation' => 50,
		'gamma' => 0.7,
		'visibility' => 'simplified'
	)
));

// specify to only add the map and not activate it
$styledMap2->doNotSet();

$gmap->add($styledMap2);

// render the map
$gmap->renderMap();

?>
