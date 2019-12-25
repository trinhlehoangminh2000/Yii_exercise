<?php

use yii\db\Migration;

/**
 * Class m191225_042311_alter_column_username_in_user
 */
class m191225_042311_alter_column_username_in_user extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this -> alterColumn('user','username','string(100)');
    }

    public function down()
    {
        $this -> alterColumn('user', 'username', 'string(50)');
    }
}
