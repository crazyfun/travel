<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Console Application',
	// application components
	'import'=>array(
		'application.models.*',
		'application.extensions.phpmail.*',
		'application.components.*',
		'application.helpers.*',
	),
	'language'=>'zh_cn',
	'components'=>array(
		'db'=>array(
		  'class'=>'system.db.CDbConnection',
			'connectionString' => 'mysql:host=localhost;dbname=travel',
			'emulatePrepare'=> true,
			'username' => 'travel',
			'password' => 'travel@2013',
			'charset' => 'utf8',
			'tablePrefix'=>'tr_',
			'schemaCachingDuration'=>3600,
		),
	),
);
