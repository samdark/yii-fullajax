<?php
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Fullajax Web Application demo',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),
	'components'=>array(
		// this is required to prevent script and css duplicates
		'clientScript' => array('class' => 'NLSClientScript'),
	),
);