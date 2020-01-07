<?php

use yii\db\Migration;

/**
 * Class m191226_074045_alter_created_at_updated_at_columns
 */
class m191226_074045_alter_created_at_updated_at_columns extends Migration
{
    public function up()
    {
        $this -> alterColumn('address','created_at','integer(11)');
        $this -> alterColumn('address','updated_at','integer(11)');
    }

    public function down()
    {
        $this -> alterColumn('address','updated_at','dateTime');
        $this -> alterColumn('address','created_at','dateTime');
    }
}
