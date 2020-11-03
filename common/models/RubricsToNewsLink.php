<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "rubrics_to_news_link".
 *
 * @property int $id
 * @property int|null $news_id
 * @property int|null $rubrics_id
 *
// * @property News $news
 * @property Rubrics $rubrics
 */
class RubricsToNewsLink extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rubrics_to_news_link';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['news_id', 'rubrics_id'], 'integer'],
            [['news_id'], 'exist', 'skipOnError' => true, 'targetClass' => News::class, 'targetAttribute' => ['news_id' => 'id']],
            [['rubrics_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rubrics::class, 'targetAttribute' => ['rubrics_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'news_id' => 'News ID',
            'rubrics_id' => 'Rubrics ID',
        ];
    }

    /**
     * Gets query for [[News]].
     *
     * @return yii\db\ActiveQuery|NewsQuery
     */
    public function getNews()
    {
        return $this->hasMany(News::class, ['id' => 'news_id']);
    }

    /**
     * Gets query for [[Rubrics]].
     *
     * @return yii\db\ActiveQuery|RubricsQuery
     */
    public function getRubrics()
    {
        return $this->hasOne(Rubrics::class, ['id' => 'rubrics_id']);
    }

    /**
     * {@inheritdoc}
     * @return RubricsToNewsLinkQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RubricsToNewsLinkQuery(get_called_class());
    }
}
