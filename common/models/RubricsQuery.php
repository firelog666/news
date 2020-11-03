<?php

namespace common\models;

use creocoder\nestedsets\NestedSetsQueryBehavior;

/**
 * This is the ActiveQuery class for [[Rubrics]].
 *
 * @see Rubrics
 */
class RubricsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/
    public function behaviors() {
        return [
            NestedSetsQueryBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     * @return Rubrics[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Rubrics|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
