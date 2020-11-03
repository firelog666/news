<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $title Заголовок
 * @property string $text Текст
 * @property string|null $created_at Дата создания
 * @property string|null $updated_at Дата редактирования
 *
 * @property RubricsToNewsLink[] $rubricsToNewsLinks
 */
class News extends ActiveRecord
{
    /**
     * @var array $rubricsIds
     */
    public $rubricsIds;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title','text'],'required'],
            [['text'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['title'], 'string', 'max' => 255],
            ['rubricsIds', 'each', 'rule' => ['exist', 'targetClass' => Rubrics::class, 'targetAttribute' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'text' => 'Текст',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата редактирования',
            'rubricsIds'=>'Рубрики'
        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => new Expression('CURRENT_TIMESTAMP()'),
            ]
        ];
    }

    /**
     * Gets query for [[RubricsToNewsLinks]].
     *
     * @return yii\db\ActiveQuery|RubricsToNewsLinkQuery
     */
    public function getRubricsToNewsLinks()
    {
        return $this->hasMany(RubricsToNewsLink::class, ['news_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return NewsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NewsQuery(get_called_class());
    }

    public function loadRubrics()
    {
        $this->rubricsIds = [];
        if (!empty($this->id)) {
            $rows = RubricsToNewsLink::find()
                ->select(['rubrics_id'])
                ->where(['news_id' => $this->id])
                ->asArray()
                ->all();
            foreach ($rows as $row) {
                $this->rubricsIds[] = $row['rubrics_id'];
            }
        }
    }

    public function saveRubrics()
    {
        RubricsToNewsLink::deleteAll(['news_id' => $this->id]);
        if (is_array($this->rubricsIds)) {
            foreach ($this->rubricsIds as $rubricIds) {
                $link = new RubricsToNewsLink();
                $link->news_id =(int) $this->id;
                $link->rubrics_id = (int)$rubricIds;
                $link->save();
            }
        }
    }

    /**
     * @return yii\db\ActiveQuery
     */
    public function getLinks()
    {
        return $this->hasMany(RubricsToNewsLink::class, ['news_id' => 'id']);
    }

    public function afterFind()
    {
        $this->loadRubrics();
        parent::afterFind();
    }

    public function afterSave($insert, $changedAttributes)
    {
        $this->saveRubrics();
        parent::afterSave($insert, $changedAttributes);
    }

    public function beforeDelete()
    {
        RubricsToNewsLink::deleteAll(['news_id'=>$this->id]);
        return parent::beforeDelete();
    }


}
