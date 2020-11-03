<?php
use yii\bootstrap4\Breadcrumbs;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Rubrics */
$this->title = 'Создание рубрики';
$this->params['breadcrumbs'][] = ['label' => 'Рубрики', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rubrics-create">
    <?php echo Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]); ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
