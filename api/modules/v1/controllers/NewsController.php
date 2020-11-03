<?php

namespace api\modules\v1\controllers;

use common\models\News;
use common\models\Rubrics;
use yii\web\MethodNotAllowedHttpException;

class NewsController extends BaseController
{
    public $modelClass = News::class;
    protected $service;

    public function actions()
    {
        $actions = parent::actions();
        // отключить действия "create"
        unset($actions['index']);
        // отключить действия "create"
        unset($actions['create']);
        // отключить действия "update"
        unset($actions['update']);
        // отключить действия "delete"
        unset($actions['delete']);
        // отключить действия "view"
        unset($actions['view']);

        return $actions;
    }

    public function actionView($id)
    {
        var_dump(123);die;
    }

}