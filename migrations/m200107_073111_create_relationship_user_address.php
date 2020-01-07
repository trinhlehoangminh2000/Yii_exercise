<?php

use yii\db\Migration;

/**
 * Class m200107_073111_create_relationship_user_address
 */
class m200107_073111_create_relationship_user_address extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this -> createIndex(
            'address_id',
            'user',
            'address_id',
            false
        );
        $this -> addForeignKey('user_ibfk_1', 'user', 'address_id','address','id_address','SET NULL','SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this -> dropForeignKey('user_ibfk_1','user');
        $this -> dropIndex('address_id','user');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200107_073111_create_relationship_user_address cannot be reverted.\n";

        return false;
    }
    */
}
