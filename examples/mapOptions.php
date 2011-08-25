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
$options = array(
    'scaleControl' => true,
    'streetViewControl' => false,
    'zoom' => 1,
    'center' => array(0,0),
    'mapTypeId' => EGmap3MapTypeId::HYBRID,
    'mapTypeControlOptions' => array(
        'style' => EGmap3MapTypeControlStyle::DROPDOWN_MENU,
        'position' => EGmap3ControlPosition::TOP_CENTER,
    ),
    'zoomControlOptions' => array(
        'style' => EGmap3ZoomControlStyle::SMALL,
        'position' => EGmap3ControlPosition::BOTTOM_CENTER
    ),
);
$gmap->setOptions($options);

// render the map
$gmap->renderMap();

?>
