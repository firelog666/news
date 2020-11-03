<?php

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */

/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
$this->title = 'Пользователи';
?>

<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'username',
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Actions',
                'headerOptions' => ['width' => '80'],
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
                        return Html::a('Просмотр', Url::toRoute(['/user/view', 'id' => $model->id]));
                    },
                    'update' => function ($url, $model, $key) {
                        return Html::a('Изменить', Url::toRoute(['/user/update', 'id' => $model->id]));
                    },
                    'delete' => function ($url, $model, $key) {
                        return Html::a('Удалить', ['delete', 'id' => $model->id], [
                            'data' => [
                                'confirm' =>'Вы действительно хотите удалить эту запись?',
                                'method' => 'post',
                            ],
                        ]);
                    },
                ],
            ],
        ],
    ]);
    ?>
</div>
