<?php

namespace api\modules\v1\controllers;

use common\models\News;
use common\models\Rubrics;
use common\models\RubricsToNewsLink;
use common\services\NewsService;
use common\services\RubricsService;
use Yii;
use yii\helpers\ArrayHelper;

class RubricsController extends BaseController
{
    public $modelClass = Rubrics::class;

    protected $service;
    protected $newsService;

    public function __construct($id, $module, $config = [])
    {
        $this->service = new RubricsService();
        $this->newsService = new NewsService();
        parent::__construct($id, $module, $config);
    }

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

    /**
     * @return array
     */
    public function actionIndex()
    {
        try {
            $tree = $this->service->createTree();
            if ($tree) {
                return [
                    'data' => [
                        'rubrics' => $tree,
                         'code' => 200
                    ]
                ];
            }
            throw new \Exception('No Content', 204);
        } catch (\Exception $e) {
            return [
                'data' => [
                    'msg' => $e->getMessage(),
                    'code' => $e->getCode()
                ]
            ];
        }
    }

    /**
     * Получение рубрик и их новостей(включая дочерние рубрики)
     * @param int $id
     * @return array
     */
    public function actionView($id)
    {
        try {
            $model = Rubrics::find()->where('rubrics.id=:id', [':id' => $id])->joinWith(['links'])->one();
            if ($model) {
                $news = $this->service->getRubricNews($model);
                return [
                    'rubrics' => $news,
                    'code' => 200
                ];
            }
            throw new \Exception('No Content', 204);
        } catch (\Exception $e) {
            return [
                'data' => [
                    'msg' => $e->getMessage(),
                    'code' => $e->getCode()
                ]
            ];
        }
    }
}