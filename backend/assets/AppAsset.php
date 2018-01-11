<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'css/site.css',
        'css/master.css',
        'https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900',
        'css/icons/icomoon/styles.css',
        'css/icons/fontawesome/styles.min.css',
        'css/bootstrap.min.css',
        'css/core.min.css',
        'css/components.min.css',
        'css/colors.min.css',
//        'css/custom.css',
    ];

    public $js = [
        'js/yii/yii_overrides.js',
        'js/plugins/loaders/pace.min.js',
        'js/core/libraries/bootstrap.min.js',
        'js/plugins/forms/selects/bootstrap_multiselect.js',
        'js/plugins/loaders/blockui.min.js',
        'js/plugins/visualization/d3/d3.min.js',
        'js/plugins/visualization/d3/d3_tooltip.js',
        'js/plugins/forms/styling/uniform.min.js',
        'js/plugins/forms/styling/switchery.min.js',
        'js/plugins/forms/styling/switch.min.js',
        'js/plugins/ui/moment/moment.min.js',
        'js/plugins/pickers/daterangepicker.js',
        'js/plugins/editors/ckeditor/ckeditor.js',
        'js/core/app.js',
        'js/yii/script.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
