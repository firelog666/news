<?php
use kartik\widgets\DateTimePicker;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\News */
/* @var $form yii\widgets\ActiveForm */
/* @var $rubricsCollection common\models\Rubrics */

?>

<div class="news-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

                    <?= $form->field($model, 'created_at')->widget(DateTimePicker::class, [
                        'options' => [],
                        'disabled' => true,
                    ]); ?>

                    <?= $form->field($model, 'updated_at')->widget(DateTimePicker::class, [
                        'options' => [],
                        'disabled' => true,
                    ]); ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">

                    <?= $form->field($model,'rubricsIds')->checkboxList((array)ArrayHelper::map($rubricsCollection, 'id', 'name')) ?>

                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Отмена', ['/news'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
