<?php

use yii\db\Migration;

/**
 * Class m200113_042423_change_password_attribute_of_user
 */
class m200113_042423_change_password_attribute_of_user extends Migration
{
    public function up()
    {
        $this -> alterColumn('user','password','string(100)');
    }

    public function down()
    {
        $this -> alterColumn('user', 'password', 'string(16)');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200113_042423_change_password_attribute_of_user cannot be reverted.\n";

        return false;
    }
    */
}
