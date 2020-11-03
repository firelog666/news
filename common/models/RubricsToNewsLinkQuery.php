<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[RubricsToNewsLink]].
 *
 * @see RubricsToNewsLink
 */
class RubricsToNewsLinkQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return RubricsToNewsLink[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return RubricsToNewsLink|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
