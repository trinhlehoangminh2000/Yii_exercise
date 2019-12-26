<?php

use yii\db\Migration;

/**
 * Class m191226_074045_alter_created_at_updated_at_columns
 */
class m191226_074045_alter_created_at_updated_at_columns extends Migration
{
    public function up()
    {
        $this -> alterColumn('article','created_at','integer(11)');
        $this -> alterColumn('article','updated_at','integer(11)');
        $this -> alterColumn('user','created_at','integer(11)');
        $this -> alterColumn('user','updated_at','integer(11)');
    }

    public function down()
    {
        $this -> alterColumn('user','updated_at','integer(20)');
        $this -> alterColumn('user','created_at','integer(20)');
        $this -> alterColumn('article','updated_at','integer(20)');
        $this -> alterColumn('article','created_at','integer(20)');
    }
}
