<?php

use yii\db\Migration;

/**
 * Class m191225_074240_create_relationship_user_article
 */
class m191225_074240_create_relationship_user_article extends Migration
{
    public function safeUp()
    {
        $this -> alterColumn('article','created_by','integer(11)');
        $this -> alterColumn('article','updated_by','integer(11)');

        $this -> createIndex(
            'created_by',
            'article',
            'created_by',
            false
        );
        $this -> createIndex(
            'updated_by',
            'article',
            'updated_by',
            false
        );
        
        $this -> addForeignKey('article_ibfk_1', 'article', 'created_by','user','id_user','SET NULL','SET NULL');
        $this -> addForeignKey('article_ibfk_2', 'article', 'updated_by','user','id_user','SET NULL','SET NULL');
    }

    public function safeDown()
    {   
        $this -> dropForeignKey('article_ibfk_2','article');
        $this -> dropForeignKey('article_ibfk_1','article');
        $this -> dropIndex('updated_by','article');
        $this -> dropIndex('created_by','article');
        $this -> alterColumn('article','created_by','string(50)');
        $this -> alterColumn('article','updated_by','string(50)');
    }
}
