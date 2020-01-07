<?php

use yii\db\Migration;

/**
 * Class m200107_072835_add_column_address_to_user
 */
class m200107_072835_add_column_address_to_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this -> addColumn('user','address_id','integer(11)');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this -> dropColumn('user','address_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200107_072835_add_column_address_to_user cannot be reverted.\n";

        return false;
    }
    */
}
