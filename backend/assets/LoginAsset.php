<?php


namespace backend\assets;


use yii\web\AssetBundle;

class LoginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900',
        'global_assets/css/icons/icomoon/styles.css',
        'css/bootstrap.min.css',
        'css/bootstrap_limitless.min.css',
        'css/layout.min.css',
        'css/components.min.css',
        'css/colors.min.css',
    ];

    public $js = [

        //<!-- Core JS files -->
        'global_assets/js/main/jquery.min.js',
        'global_assets/js/main/bootstrap.bundle.min.js',
//        'global_assets/js/plugins/loaders/blockui.min.js',
        //<!-- /core JS files -->

        //<!-- Theme JS files -->
//        'global_assets/js/plugins/forms/styling/uniform.min.js',
        //        'js/app.js',
        'global_assets/js/demo_pages/login.js',
        //<!-- /theme JS files -->

    ];
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];

}