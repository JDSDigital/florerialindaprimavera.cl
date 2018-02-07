<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'http://fonts.googleapis.com/css?family=Open+Sans:300,400,400italic,600,700|Raleway:300,400,500,600',
//        'inc/bootstrap/css/bootstrap.min.css',
        'inc/font-awesome/css/font-awesome.min.css',
        'inc/animate.css',
        'inc/rs-plugin/css/settings.css',
        'css/vegas.min.css',
        'css/master.css',
        'css/style.css',
        'css/site.css',
    ];
    public $js = [
        'inc/jquery/jquery-2.1.0.min.js',
//        'inc/bootstrap/js/bootstrap.min.js',
        'inc/rs-plugin/js/jquery.themepunch.tools.min.js',
        'inc/rs-plugin/js/jquery.themepunch.revolution.min.js',
        'inc/jquery.appear.js',
        'inc/retina.min.js',
        'inc/jflickrfeed.min.js',
//        'inc/jquery.validate.min.js',
        'js/vegas.min.js',
        'js/script.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
