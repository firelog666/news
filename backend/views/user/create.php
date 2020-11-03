<?php

use yii\bootstrap4\Breadcrumbs;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\forms\SignupForm */

$this->title = 'Create User';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <?php echo Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]); ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'isNewRecord'=> true
    ]) ?>

</div>
