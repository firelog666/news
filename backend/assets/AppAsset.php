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
//        'css/site.css',
        'global_assets/css/icons/icomoon/styles.css',
        'css/bootstrap.min.css',
        'css/bootstrap_limitless.min.css',
        'css/layout.min.css',
        'css/components.min.css',
        'css/colors.min.css',
    ];
    public $js = [
//        "global_assets/js/main/jquery.min.js",
        "global_assets/js/main/bootstrap.bundle.min.js",
        "global_assets/js/plugins/loaders/blockui.min.js",
//	<!-- /core JS files -->

//	<!-- Theme JS files -->
        "global_assets/js/plugins/visualization/d3/d3.min.js",
        "global_assets/js/plugins/visualization/d3/d3_tooltip.js",
        "global_assets/js/plugins/ui/moment/moment.min.js",
        "global_assets/js/plugins/ui/perfect_scrollbar.min.js",
        "js/app.js",
        "js/ajax.js",
        "js/teamValidator.js",
//        "global_assets/js/demo_pages/dashboard.js",
        "global_assets/js/demo_pages/layout_fixed_sidebar_custom.js",
//	<!-- /theme JS files -->

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
