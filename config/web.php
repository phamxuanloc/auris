<?php
$params = require __DIR__ . '/params.php';
$db     = require __DIR__ . '/db.php';
$config = [
	'id'           => 'basic',
	'basePath'     => dirname(__DIR__),
	'bootstrap'    => ['log'],
	'defaultRoute' => 'customer/index',
	'aliases'      => [
		'@bower' => '@vendor/bower-asset',
		'@npm'   => '@vendor/npm-asset',
	],
	'components'   => [
		'formatter'    => [
			'class'             => 'yii\i18n\Formatter',
			'nullDisplay'       => '',
			'thousandSeparator' => '.',
			'decimalSeparator'  => ',',
		],
		'request'      => [
			// !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
			'cookieValidationKey' => 'GwJQ_CUIp4sMq9S-EsmlX2HRLvnHv5Yq',
		],
		'cache'        => [
			'class' => 'yii\caching\FileCache',
		],
		'user'         => [
			'identityClass'   => 'app\models\User',
			'enableAutoLogin' => true,
		],
		'errorHandler' => [
			'errorAction' => 'site/error',
		],
		'mailer'       => [
			'class'            => 'yii\swiftmailer\Mailer',
			// send all mails to a file by default. You have to set
			// 'useFileTransport' to false and configure a transport
			// for the mailer to send real emails.
			'useFileTransport' => true,
		],
		'log'          => [
			'traceLevel' => YII_DEBUG ? 3 : 0,
			'targets'    => [
				[
					'class'  => 'yii\log\FileTarget',
					'levels' => [
						'error',
						'warning',
					],
				],
			],
		],
		'assetManager' => [
			'bundles' => [
				'wbraganca\dynamicform\DynamicFormAsset' => [
					'sourcePath' => '@app/web/js',
					'js'         => [
						'yii2-dynamic-form.js',
					],
				],
			],
		],
		'db'           => $db,
		'sse'          => [
			'class' => \odannyc\Yii2SSE\LibSSE::class,
		],
		'view'         => [
			'theme' => [
				'pathMap' => [
					'@dektrium/user/views' => '@app/views/user',
				],
			],
		],
		/*
		'urlManager' => [
			'enablePrettyUrl' => true,
			'showScriptName' => false,
			'rules' => [
			],
		],
		*/
	],
	'modules'      => [
		'user'     => [
			'class'         => 'dektrium\user\Module',
			'modelMap'      => [
				'User'       => 'app\models\User',
				//IMPORTANT & REQUIRED, change to your User model if overridden
				'LoginForm'  => 'navatech\role\models\LoginForm',
				//IMPORTANT & REQUIRED
				'UserSearch' => 'app\models\UserSearch',
			],
			'controllerMap' => [
				'admin'    => [
					'class' => 'app\controllers\AdminController',
				],
				'security' => ['class' => 'app\controllers\LoginController'],
			],
		],
		'role'     => [
			'class'       => 'navatech\role\Module',
			'controllers' => [ //namespaces of controllers
				'app\controllers',
				'navatech\role\controllers',
			],
		],
		'gridview' => [
			'class' => '\kartik\grid\Module',
		],
	],
	'params'       => $params,
];
if(YII_ENV_DEV) {
	// configuration adjustments for 'dev' environment
	$config['bootstrap'][]      = 'debug';
	$config['modules']['debug'] = [
		'class' => 'yii\debug\Module',
		// uncomment the following to add your IP if you are not connecting from localhost.
		//'allowedIPs' => ['127.0.0.1', '::1'],
	];
	$config['bootstrap'][]      = 'gii';
	$config['modules']['gii']   = [
		'class' => 'yii\gii\Module',
		// uncomment the following to add your IP if you are not connecting from localhost.
		//'allowedIPs' => ['127.0.0.1', '::1'],
	];
}
return $config;
