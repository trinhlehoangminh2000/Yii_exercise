<?php

use yii\db\Migration;

/**
 * Class m191225_070125_change_data_type_of_datetime
 */
class m191225_070125_change_data_type_of_datetime extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this -> alterColumn('user','created_at','integer(20)');
        $this -> alterColumn('user','updated_at','integer(20)');

        $this -> alterColumn('article','created_at','integer(20)');
        $this -> alterColumn('article','updated_at','integer(20)');
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this -> alterColumn('user','created_at','DATETIME(6) NULL DEFAULT NULL');
        $this -> alterColumn('user','updated_at','DATETIME(6) NULL DEFAULT NULL');

        $this -> alterColumn('article','created_at','DATETIME(6) NULL DEFAULT NULL');
        $this -> alterColumn('article','updated_at','DATETIME(6) NULL DEFAULT NULL');
    }


}
