<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'auris/animate.css/animate.min.css',
        'auris/glyphicons/glyphicons.css',
        'auris/font-awesome/css/font-awesome.min.css',
        'auris/material-design-icons/material-design-icons.css',
        'auris/bootstrap/dist/css/bootstrap.min.css',
        'auris/styles/app.css',
        'auris/styles/font.css',
        'css/site.css',
        'css/icon.css'
    ];
    public $js = [
//        'auris/libs/jquery/tether/dist/js/tether.min.js',
//        'auris/libs/jquery/underscore/underscore-min.js',
//        'auris/libs/jquery/jQuery-Storage-API/jquery.storageapi.min.js',
//        'auris/libs/jquery/PACE/pace.min.js',
//        'auris/scripts/palette.js',
//        'auris/scripts/ui-load.js',
//        'auris/scripts/ui-jp.js',
//        'auris/scripts/ui-include.js',
//        'auris/scripts/ui-device.js',
//        'auris/scripts/ui-form.js',
//        'auris/scripts/ui-nav.js',
//        'auris/scripts/ui-screenfull.js',
//        'auris/scripts/ui-scroll-to.js',
//        'auris/scripts/ui-toggle-class.js',
//        'auris/scripts/app.js',
//        'auris/scripts/ajax.js',
//        'auris/libs/js/echarts/build/dist/echarts-all.js',
//        'auris/libs/js/echarts/build/dist/jquery.echarts.js',
        'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
//    public $jsOptions = [
//        'position' => \yii\web\View::POS_HEAD
//    ];
}
