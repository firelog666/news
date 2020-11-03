<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%rubrics}}`.
 */
class m201031_083635_create_rubrics_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%rubrics}}', [
            'id' => $this->primaryKey(),
            'tree' => $this->integer(),
            'lft' => $this->integer()->notNull(),
            'rgt' => $this->integer()->notNull(),
            'depth' => $this->integer()->notNull(),
            'name' => $this->string()->notNull()->comment('Название рубрики'),
            'created_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP()')->comment('Дата создания'),
            'updated_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP()')->comment('Дата редактирования')
        ]);
        $this->createIndex('rubrics-id-idx','{{%rubrics}}','id');
        $this->createIndex('rubrics-lft-idx','{{%rubrics}}','lft');
        $this->createIndex('rubrics-rgt-idx','{{%rubrics}}','rgt');
        $this->createIndex('rubrics-depth-idx','{{%rubrics}}','depth');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%rubrics}}');
    }
}
