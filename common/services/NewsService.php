<?php


namespace common\services;


use common\models\News;
use yii\helpers\ArrayHelper;

class NewsService
{
    /**
     * @param object $newsObject
     * @return array
     */
    public function objectToArray($newsObject)
    {
        return ArrayHelper::toArray($newsObject, [
            News::class => [
                'id',
                'title',
                'text',
                'created_at'
            ]
        ]);
    }


}