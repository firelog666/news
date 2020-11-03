<?php

use yii\bootstrap4\Breadcrumbs;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Новости';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <?php echo Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]); ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'text:ntext',
            'created_at',
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Действия',
                'headerOptions' => ['width' => '300px'],
                'template' => '<div class="btn-group btn-group-justified">
                                     <div class="btn-group">
										<button type="button" class="btn btn-outline-primary">{view}</button>
									</div>
                                    <div class="btn-group">
										<button type="button" class="btn btn-outline-primary">{update}</button>
									</div>
									 <div class="btn-group">
										<button type="button" class="btn btn-outline-primary">{delete}</button>
									</div>
								</div>',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        return Html::a('Просмотр', Url::toRoute(['/news/view', 'id' => $model->id]));
                    },
                    'update' => function ($url, $model, $key) {
                        return Html::a('Редактировать', Url::toRoute(['/news/update', 'id' => $model->id]));
                    },
                    'delete' => function ($url, $model, $key) {
                        return Html::a('Удалить', ['delete', 'id' => $model->id], [
                            'data' => [
                                'confirm' => 'Вы действительно хотите удалить эту запись?',
                                'method' => 'post',
                            ],
                        ]);
                    },
                ],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
