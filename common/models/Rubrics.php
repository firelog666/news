<?php

namespace common\models;

use creocoder\nestedsets\NestedSetsBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "rubrics".
 *
 * @property int $id
 * @property int $elementsft
 * @property int $rgt
 * @property int $depth
 * @property string $name
 */
class Rubrics extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'tree' => [
                'class' => NestedSetsBehavior::class,
                'treeAttribute' => 'tree',
            ],
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

    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }


    public static function tableName()
    {
        return 'rubrics';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lft', 'rgt', 'depth', 'tree'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lft' => 'Lft',
            'rgt' => 'Rgt',
            'tree' => 'Tree',
            'depth' => 'Depth',
            'name' => 'Название',
        ];
    }

    /**
     * {@inheritdoc}
     * @return RubricsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RubricsQuery(get_called_class());
    }

    /**
     * @return yii\db\ActiveQuery
     */
    public function getLinks()
    {
        return $this->hasMany(RubricsToNewsLink::class, ['rubrics_id' => 'id']);
    }

    /**
     * Get parent's node
     * @return string|Yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->parents(1)->one();
    }

    /**
     * @return mixed|string
     */
    public function getParentName()
    {
        $parent =  $this->getParent();
        return ($parent) ? $parent->name : ' ';
    }


    public function beforeDelete()
    {
        RubricsToNewsLink::deleteAll(['rubrics_id'=>$this->id]);
        return parent::beforeDelete();
    }

}
