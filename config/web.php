<?php

use zertex\avatar_generator\AvatarGenerator;

$params = require __DIR__ . '/params.php';
$db     = require __DIR__ . '/db.php';
$config = [
	'id'           => 'basic',
	'basePath'     => dirname(__DIR__),
	'bootstrap'    => ['log'],
	'defaultRoute' => 'customer/index',
    'timeZone' => 'Asia/Ho_Chi_Minh',
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
		'avatar' => [
			'class' => AvatarGenerator::class,
			'images_folder' => 'avatar',
			'images_url' => '/avatar',
			'size_width' => 300,            // default: 300
			'font_size' => 200,             // default: 200
			'salt' => 'random_salt',        // salt for image file names
			'texture' => ['sun', 'rain'],   // texture name
			'text_over_image' => true,      // draw text over image (for avatar from file)
			'texture_over_image' => true,   // draw texture over image (for avatar from file)
		],
		'request'      => [
            'enableCsrfValidation' => false,
			// !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
			'cookieValidationKey' => 'GwJQ_CUIp4sMq9S-EsmlX2HRLvnHv5Yq',
		],
		'cache'        => [
			'class' => 'yii\caching\FileCache',
		],
//		'user'         => [
////			'identityClass'   => 'app\models\User',
//			'enableAutoLogin' => true,
//		],
		'redis' => [
			'class' => 'yii\redis\Connection',
			'hostname' => 'localhost',
			'port' => 6379,
			'database' => 0,
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
			'flushInterval' => 1,

			'targets'    => [
				[
					'class'  => 'yii\log\FileTarget',
					'levels' => [
						'error',
						'warning',
					],
					'exportInterval' => 1
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
        'fileStorage' => [
            'class' => '\trntv\filekit\Storage',
            'baseUrl' => '@webroot/uploads',
            'filesystem' => [
                'class' => 'app\components\filesystem\LocalFlysystemBuilder',
                'path' => '/Applications/MAMP/htdocs/auris/web/uploads'
            ],
            'as log' => [
                'class' => 'app\components\behaviors\FileStorageLogBehavior',
                'component' => 'fileStorage'
            ]
        ],
	],
	'modules'      => [
		'user'     => [
		    'adminPermission' => true,
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
	$config['bootstrap'][]      = 'gii';
	$config['modules']['gii']   = [
		'class' => 'yii\gii\Module',
		// uncomment the following to add your IP if you are not connecting from localhost.
		//'allowedIPs' => ['127.0.0.1', '::1'],
	];
}
return $config;
