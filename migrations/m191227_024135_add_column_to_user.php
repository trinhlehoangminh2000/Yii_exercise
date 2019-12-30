<?php

use yii\db\Migration;

/**
 * Class m191227_024135_add_column_to_user
 */
class m191227_024135_add_column_to_user extends Migration
{
    public function up()
    {
        $this -> addColumn('user','auth_key','string(32)');
    }

    public function down()
    {
        $this -> dropColumn('user','auth_key');
    }
}
