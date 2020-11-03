<?php

/* @var $this \yii\web\View */

/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js" crossorigin="anonymous"></script>
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="navbar-top">
<?php $this->beginBody() ?>
<div class="navbar navbar-expand-md navbar-light fixed-top">

    <!-- Header with logos -->
    <div class="navbar-header navbar-dark d-none d-md-flex align-items-md-center">
        <div class="navbar-brand navbar-brand-md">
            <a href="/" class="d-inline-block">

            </a>
        </div>

        <div class="navbar-brand navbar-brand-xs">
            <a href="/" class="d-inline-block">
            </a>
        </div>
    </div>
    <!-- /header with logos -->


    <!-- Mobile controls -->
    <div class="d-flex flex-1 d-md-none">
        <div class="navbar-brand mr-auto">
            <a href="index.html" class="d-inline-block">
                <img src="../../../../global_assets/images/logo_dark.png" alt="">
            </a>
        </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="icon-tree5"></i>
        </button>

        <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
            <i class="icon-paragraph-justify3"></i>
        </button>
    </div>
    <!-- /mobile controls -->


    <!-- Navbar content -->
    <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                    <i class="icon-paragraph-justify3"></i>
                </a>
            </li>
        </ul>

        <span class="badge badge-pill ml-md-3 mr-md-auto"> </span>

        <ul class="navbar-nav">
            <li class="nav-item dropdown dropdown-user">
                <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
                    <img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="rounded-circle mr-2"
                         height="34" alt="">
                    <span><?= Yii::$app->user->identity->username ?></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    <a href="<?=Url::toRoute('site/logout')?>" class="dropdown-item"><i
                                class="icon-switch2"></i>Выход</a>
                </div>
            </li>

        </ul>
    </div>
    <!-- /navbar content -->

</div>
<div class="page-content">

    <!-- Main sidebar -->
    <div class="sidebar sidebar-dark sidebar-main sidebar-fixed sidebar-expand-md">

        <!-- Sidebar mobile toggler -->
        <div class="sidebar-mobile-toggler text-center">
            <a href="#" class="sidebar-mobile-main-toggle">
                <i class="icon-arrow-left8"></i>
            </a>
            Navigation
            <a href="#" class="sidebar-mobile-expand">
                <i class="icon-screen-full"></i>
                <i class="icon-screen-normal"></i>
            </a>
        </div>
        <!-- /sidebar mobile toggler -->


        <!-- Sidebar content -->
        <div class="sidebar-content ps ps--active-y">

            <!-- User menu -->
            <div class="sidebar-user">
                <div class="card-body">
                    <div class="media">
                        <div class="mr-3">
                        </div>
                        <div class="media-body">
                            <div class="media-title font-weight-semibold"><?= Yii::$app->user->identity->username ?></div>
                            <div class="font-size-xs opacity-50">
                                <i class="icon-pin font-size-sm"></i>Kazakhstan
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /user menu -->


            <!-- Main navigation -->
            <div class="card card-sidebar-mobile">
                <ul class="nav nav-sidebar" data-nav-type="accordion">

                    <!-- Main -->
                    <li class="nav-item-header">
                        <div class="text-uppercase font-size-xs line-height-xs">Меню</div>
                        <i class="icon-menu" title="Main"></i></li>
                    <li class="nav-item">
                        <a href="<?=Url::toRoute('site/index')?>" class="nav-link">
                            <i class="icon-home4"></i>
                            <span>
								Главная
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?=Url::toRoute('news/index')?>" class="nav-link"><i
                                    class="icon-newspaper"></i><span>Новости</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="<?=Url::toRoute('rubrics/index')?>" class="nav-link"><i
                                    class="icon-stack"></i><span>Рубрики</span></a>
                    </li>
                    <!-- /main -->
                </ul>
            </div>
            <!-- /main navigation -->

            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
            </div>
            <div class="ps__rail-y" style="top: 0px; height: 453px; right: 0px;">
                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 172px;"></div>
            </div>
        </div>
        <!-- /sidebar content -->

    </div>
    <!-- /main sidebar -->
    <div class="d3-tip"
         style="position: absolute; top: 0px; display: none; pointer-events: none; box-sizing: border-box;"></div>
    <div class="d3-tip"
         style="position: absolute; top: 0px; display: none; pointer-events: none; box-sizing: border-box;"></div>
    <div class="d3-tip e"
         style="position: absolute; top: 721px; display: none; pointer-events: none; box-sizing: border-box; left: 368px;">
        <ul class="list-unstyled mb-1">
            <li>
                <div class="font-size-base mb-1 mt-1"><i class="icon-youtube mr-2">

                    </i>Youtube video
                </div>
            </li>
            <li>Visits: &nbsp;
                <span class="font-weight-semibold float-right">3909</span>
            </li>
            <li>Share: &nbsp;
                <span class="font-weight-semibold float-right">49.46%</span>
            </li>
        </ul>
        <div class="d3-tip-arrow"></div>
    </div>
    <div class="d3-tip"
         style="position: absolute; top: 0px; display: none; pointer-events: none; box-sizing: border-box;"></div>
    <div class="d3-tip"
         style="position: absolute; top: 0px; display: none; pointer-events: none; box-sizing: border-box;"></div>
    <div class="d3-tip"
         style="position: absolute; top: 0px; display: none; pointer-events: none; box-sizing: border-box;"></div>
    <div class="d3-tip"
         style="position: absolute; top: 0px; display: none; pointer-events: none; box-sizing: border-box;"></div>
    <div class="d3-tip"
         style="position: absolute; top: 0px; display: none; pointer-events: none; box-sizing: border-box;"></div>
    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Page header -->
        <!--        <div class="page-header">-->
        <!--            <div class="page-header-content header-elements-md-inline">-->
        <!--                <div class="page-title d-flex">-->
        <!--                    <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Главная страница</span> - Dashboard</h4>-->
        <!--                    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>-->
        <!--                </div>-->
        <!---->
        <!--                <div class="header-elements d-none text-center text-md-left mb-3 mb-md-0">-->
        <!--                    <div class="btn-group">-->
        <!--                        <button type="button" class="btn bg-indigo-400"><i class="icon-stack2 mr-2"></i> New report</button>-->
        <!--                        <button type="button" class="btn bg-indigo-400 dropdown-toggle" data-toggle="dropdown"></button>-->
        <!--                        <div class="dropdown-menu dropdown-menu-right">-->
        <!--                            <div class="dropdown-header">Actions</div>-->
        <!--                            <a href="#" class="dropdown-item"><i class="icon-file-eye"></i> View reports</a>-->
        <!--                            <a href="#" class="dropdown-item"><i class="icon-file-plus"></i> Edit reports</a>-->
        <!--                            <a href="#" class="dropdown-item"><i class="icon-file-stats"></i> Statistics</a>-->
        <!--                            <div class="dropdown-header">Export</div>-->
        <!--                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to PDF</a>-->
        <!--                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to CSV</a>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!-- /page header -->


        <!-- Content area -->
        <div class="content pt-0">

            <!-- Main charts -->
            <div class="row">
                <div class="col-xl-12">

                    <!-- Traffic sources -->
                    <?php /** @var $content */ ?>
                    <?= $content ?>
                    <!-- /traffic sources -->

                </div>

            </div>
            <!-- /main charts -->

        </div>
        <!-- /content area -->


        <!-- Footer -->
        <div class="navbar navbar-expand-lg navbar-light">
            <div class="text-center d-lg-none w-100">
                <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse"
                        data-target="#navbar-footer">
                    <i class="icon-unfold mr-2"></i>
                    Footer
                </button>
            </div>

            <div class="navbar-collapse collapse" id="navbar-footer">
					<span class="navbar-text">
						© 2015 - 2020. <a href="#">Футер</a>
					</span>
            </div>
        </div>
        <!-- /footer -->

    </div>
    <!-- /main content -->

</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
