<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return CMap::mergeArray(
	require(dirname(__FILE__).'/main.php'),
	array(
		'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
		'name'=>'CEG CSV Imports',
		// application components
		'components'=>array(
			'db'=>array(
				'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/jr-site-visits.db',
			),
			// uncomment the following to use a MySQL database
			/*
			'db'=>array(
				'connectionString' => 'mysql:host=localhost;dbname=testdrive',
				'emulatePrepare' => true,
				'username' => 'root',
				'password' => '',
				'charset' => 'utf8',
			),
			*/
		),
	)
);