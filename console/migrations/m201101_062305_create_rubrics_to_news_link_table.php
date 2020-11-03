<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%rubrics_to_news_link}}`.
 */
class m201101_062305_create_rubrics_to_news_link_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%rubrics_to_news_link}}', [
            'id' => $this->primaryKey(),
            'news_id'=>$this->integer(),
            'rubrics_id'=>$this->integer()
        ]);
        $this->createIndex('links-news_id-idx','{{%rubrics_to_news_link}}','news_id');
        $this->createIndex('links-rubrics_id-idx','{{%rubrics_to_news_link}}','rubrics_id');
        $this->addForeignKey('link-news_id-fk','{{%rubrics_to_news_link}}','news_id','{{%news}}','id');
        $this->addForeignKey('link-rubrics_id-fk','{{%rubrics_to_news_link}}','rubrics_id','{{%rubrics}}','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('link-news_id-fk','{{%rubrics_to_news_link}}');
        $this->dropForeignKey('link-rubrics_id-fk','{{%rubrics_to_news_link}}');
        $this->dropTable('{{%rubrics_to_news_link}}');
    }
}
