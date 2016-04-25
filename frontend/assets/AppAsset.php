<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'source/css/tango/skin.css',
        'source/css/chosen.css',
        'source/css/flexslider.css',
        'source/css/font-awesome.min.css',
        'source/css/slider.css',
        'source/css/style.css',
        'source/css/regstyle.css',
    // 'source/css/bootstrap.min.css',
       
    ];
    public $js = [
     'source/js/main.js',
      // 'source/js/vendor/bootstrap.min.js',
       'source/js/vendor/bootstrap-slider.js',
       'source/js/vendor/chosen.jquery.min.js',
       'source/js/vendor/jquery.flexslider-min.js',
       'source/js/vendor/jquery.jcarousel.min.js',
       'source/js/vendor/jquery.placeholder.min.js',
       'source/js/vendor/jquery.raty.min.js',
       //'source/js/vendor/jquery-1.10.1.min.js',
       'source/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js',
       'source/js/vendor/tinynav.min.js',      
    ];
    public $depends = [
        'yii\web\YiiAsset',//yii.js  jquery.js
        'yii\bootstrap\BootstrapAsset', //bootstrap.css
        'yii\bootstrap\BootstrapPluginAsset',//bootstrap.js
    ];
}
