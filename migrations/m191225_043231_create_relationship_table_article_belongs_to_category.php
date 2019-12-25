<?php

use yii\db\Migration;

/**
 * Class m191225_043231_create_relationship_table_article_belongs_to_category
 */
class m191225_043231_create_relationship_table_article_belongs_to_category extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function safeUp()
    {
        $this -> createTable('category',[
            'id_category' => $this->primaryKey(),
            'name'=> $this->string(50)
        ]);

        $this -> createTable('article_category',[
            'id_article_category'=> $this ->primaryKey(),
            'article_id' => $this->integer(11),
            'category_id' => $this->integer(11)
        ]);
        
        $this -> createIndex(
            'article_id',
            'article_category',
            'article_id',
            false
        );
        $this -> createIndex(
            'category_id',
            'article_category',
            'category_id',
            false
        );

        $this -> addForeignKey('belong_to_ibfk_1', 'article_category', 'category_id','category','id_category','SET NULL','SET NULL');
        $this -> addForeignKey('belong_to_ibfk_2', 'article_category', 'article_id','article','id_article','SET NULL','SET NULL');
    }

    public function safeDown()
    {
        $this ->dropTable('article_category');
        $this ->dropTable('category');
    }
}
