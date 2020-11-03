<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Rubrics */
/* @var $rubrics common\models\Rubrics */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rubrics-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="card">
        <div class="card-body">

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Отмена', ['/rubrics'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
