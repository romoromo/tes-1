<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Sistem Informasi Manajemen Pendapatan Kota Yogyakarta',
	'theme'=>'smartadmin',
	'homeUrl'=>array('site/landing'),

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.modules.app.models.Tblmenu',
		'application.modules.app.models.Tblrole',
		'ext.DBFetch',
		'ext.LokalIndonesia',
		'ext.DMOrcl',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool

		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'app_rahasia',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('*'),

		),
		'app', // load modul utama
		'pendaftaran',
		'pelayanan',
		'sptpd',
		'pendataan',
		'bphtb',
		'penetapan',
		'penyetoran',
		'pembukuan',
		'penagihan',
		'pendaftaran_bphtp',
		'rekap_notaris',
		'verifikasi_1',
		'verifikasi_2',
		'pengambilan',
		'status_proses',
		'cetak',
		'pelaporan',
		'laporan',
		'reklame',
		'hiburan',
		'restoran',
		'pendataan',
		'parkir',
		'walet',
		'hotel',
		'ppj',
		'pembukuandanpelaporan',
		'airtanah',
		'setoran_pajak',
		'Setoranpajak_Trasfer',
		'daftar_setoran',
		'validasi',
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'authTimeout' => 60000
		),
		// uncomment the following to enable URLs in path-format

		'urlManager'=>array(
			'urlFormat'=>'path',
			//'urlSuffix'=>'.html',
			'showScriptName'=>false, // jangan tampilkan index.php di URL
			'rules'=>array(
				'pelayanan/detailpajak/<id>'=>'pelayanan/detailpajak/id/<id>',
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
				/*'view/<controller:\w+>/<id:\d+>'=>'<controller>/view', //offer/1 -> admin/offer/1
				'view/<controller:\w+>/<action:\w+>'=>'<controller>/<action>', //offer/index -> admin/offer/index,
				'view/<controller:\w*>/<action:\w+>/<id:\d+>'=> '<controller>/<action>', //offer/update/1 -> admin/offer/update/1*/
			),
		),

		'dompdf'=>array(
            'class'=>'ext.yiidompdf.yiidompdf'
        ),

		/*'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database

		/* 'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=epajak_dbsimpadakotajogjaversi1.1',
			'emulatePrepare' => true,
			'username' => 'epajak_jgjv1',
			'password' => '!7HlcHViVn7.',
			'charset' => 'utf8',
			'enableParamLogging' => true,
		), */

		'db'=>array(
			'class'=>'ext.oci8Pdo.OciDbConnection',
			'connectionString' => 'oci:dbname=202.169.229.188/BPHTB',
			'emulatePrepare' => true,
			'username' => 'SIMPATDAJOGJAYII',
			'password' => 'diginet',
			'enableProfiling' => true,
            'enableParamLogging' => true,
			'charset' => 'utf8',
		),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@diginetmedia.co.id',
		'salt'=>'diginetmedia_!@#$%^&*()',
	),
);
