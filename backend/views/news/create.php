<?php

use yii\bootstrap4\Breadcrumbs;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\News */
$this->title = 'Создать новость';
$this->params['breadcrumbs'][] = ['label' => 'Новости', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-create">
    <?php echo Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]); ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'rubricsCollection'=>$rubricsCollection
    ]) ?>

</div>
