<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\forms\SignupForm */
/* @var $form yii\widgets\ActiveForm; */
/* @var $isNewRecord */
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
?>

<div class="user-form">

    <div class="row">
        <div class="col-md-12">
            <?php $form = ActiveForm::begin([
                'id' => 'form-signup',
                'options' => ['enctype' => 'multipart/form-data']
            ]); ?>
            <div class="card">
                <div class="card-body">
                    <?= $form->field($model, 'username')->textInput() ?>

                    <?= $form->field($model, 'email')->textInput() ?>

                    <?php if ($isNewRecord): ?>
                        <?= $form->field($model, 'password')->passwordInput() ?>
                    <?php else: ?>

                        <?= $form->field($model, 'newPassword')->passwordInput()->label('Введите новый пароль') ?>

                    <?php endif; ?>
                </div>

            </div>
        </div>
        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
            <?= Html::a('Отмена', ['/users'], ['class' => 'btn btn-danger']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>

</div>
