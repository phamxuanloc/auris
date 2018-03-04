<?php
/**
 * @link      http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license   http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since  2.0
 */
class VoteAsset extends AssetBundle {

	public $basePath  = '@webroot';

	public $baseUrl   = '@web';

	public $css       = [
		'css/vote.css',
	];

	public $js        = [
		'https://code.jquery.com/jquery-migrate-1.3.0.js',
	];

	public $depends   = [
		'yii\web\YiiAsset',
		'yii\bootstrap\BootstrapPluginAsset',
	];

	public $jsOptions = ['position' => View::POS_HEAD];
}