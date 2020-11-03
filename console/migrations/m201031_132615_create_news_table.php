<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news}}`.
 */
class m201031_132615_create_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%news}}', [
            'id' => $this->primaryKey(),
            'title'=>$this->string()->comment('Заголовок'),
            'text'=>$this->text()->comment('Текст'),
            'created_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP()')->comment('Дата создания'),
            'updated_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP()')->comment('Дата редактирования')
        ]);
        $this->createIndex('id-idx','{{%news}}','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%news}}');
    }
}
