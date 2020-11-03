<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \common\models\LoginForm */


use backend\assets\LoginAsset;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
LoginAsset::register($this);
?>
<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
<body class="">

<!-- Page content -->
<div class="page-content">

    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Content area -->
        <div class="content d-flex justify-content-center align-items-center">

            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'class' => 'login-form',
                'fieldConfig' =>
                    [
                        'options' =>
                            [
                                'tag' => false,
                            ]
                    ]
            ]); ?>
            <!-- Login form -->
            <!--            <form class="login-form" action="index.html">-->
            <div class="card mb-0">
                <div class="card-body">
                    <div class="text-center mb-3">
                        <i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
                        <h5 class="mb-0">Войдите в ваш аккаунт</h5>
                        <span class="d-block text-muted">Введите ваши данные</span>
                    </div>

                    <div class="form-group form-group-feedback form-group-feedback-left">
                        <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'class' => 'form-control', 'placeholder' => 'Логин'])->label(false) ?>
                    </div>

                    <div class="form-group form-group-feedback form-group-feedback-left">
                        <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control', 'placeholder' => 'Пароль'])->label(false) ?>
                    </div>

                    <?= $form->field($model, 'rememberMe')->checkbox(['class'=>'form-input-styled'])->label('Запомнить',['class'=>'form-check-label']); ?>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Sign in <i class="icon-circle-right2 ml-2"></i></button>
                    </div>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
            <!--            </form>-->
            <!-- /login form -->

        </div>
        <!-- /content area -->
    </div>
    <!-- /main content -->
</div>
<!-- /page content -->

</body>

